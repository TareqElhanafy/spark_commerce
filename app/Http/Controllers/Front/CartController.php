<?php

namespace App\Http\Controllers\Front;

use App\Coupon;
use App\Events\NewPurchase;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddPaymentRequest;
use App\Http\Requests\ApplyCouponRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    //Add product to cart from the front page and from the product page
    public function add($id)
    {
        if (!Auth::check()) {
            return response()->json([
                'alert' => 'warning',
                'message' => 'You must login first',
            ]);
        } else {
            $product = Product::find($id);
            if (!$product) {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'This product does not exist',
                ]);
            }
            if ($product->discount == null) {
                $data = [];
                $data['id'] = $id;
                $data['name'] = $product->name;
                $data['price'] = $product->price;
                $data['weight'] = 1;
                $data['qty'] = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['size'] = $product->size;
                $data['options']['color'] = $product->color;
                \Cart::add($data);
                return response()->json([
                    'alert' => 'success',
                    'message' => 'This product added to your cart succeessfully',
                ]);
            } else {
                $data = [];
                $data['id'] = $id;
                $data['name'] = $product->name;
                $data['price'] = $product->discount;
                $data['weight'] = 1;
                $data['qty'] = 1;
                $data['options']['image'] = $product->image_one;
                $data['options']['size'] = $product->size;
                $data['options']['color'] = $product->color;
                \Cart::add($data);
                return response()->json([
                    'alert' => 'success',
                    'message' => 'This product added to your cart succeessfully',
                ]);
            }
        }
    }

    public function check()
    {
        return \Cart::Content();
    }

    //get the cart page
    public function show()
    {
        $content = \Cart::content();
        return view('front.cart.index', compact('content'));
    }

    //update the cart items quantity
    public function updateqty(Request $request, $rowId)
    {
        \Cart::update($rowId, ['qty' => $request->qty]); // Will update the name
        return redirect()->back()->with([
            'message' => 'This product quantity updated succeessfully',
            'alert-type' => 'success',
        ]);
    }

    //Remove item from the cart
    public function destroy($rowId)
    {
        \Cart::remove($rowId);
        if (\Cart::content()->count() > 0) {
            return redirect()->back()->with([
                'message' => 'This product item deleted succeessfully',
                'alert-type' => 'success',
            ]);
        }
        return redirect()->route('cart')->with([
            'message' => 'This product item deleted succeessfully',
            'alert-type' => 'success',
        ]);
    }

    //get the checkout page
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with([
                'alert-type' => 'warning',
                'message' => 'You must login first',
            ]);
        } else {
            $content = \Cart::content();
            return view('front.cart.checkout', compact('content'));
        }
    }

    //Apply coupons
    public function coupon(ApplyCouponRequest $request)
    {
        $check = Coupon::where('code', $request->coupon)->first();
        if (!$check) {
            return redirect()->back()->with([
                'alert-type' => 'danger',
                'message' => 'Invaild Coupon'
            ]);
        } else {
            Session::put('coupon', [
                'name' => $check->code,
                'discount' => $check->discount,
                'balance' => \Cart::subtotal() - $check->discount
            ]);
            return redirect()->back()->with([
                'alert-type' => 'success',
                'message' => 'Coupon Applied'
            ]);
        }
    }

    public function removecoupon()
    {
        Session::forget('coupon');
        return redirect()->back()->with([
            'alert-type' => 'success',
            'message' => 'Coupon Removed'
        ]);
    }

    //get the payment view
    public function payment()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with([
                'alert-type' => 'warning',
                'message' => 'You must login first',
            ]);
        } else {
            $cart = \Cart::content();
            return view('front.cart.payment', compact('cart'));
        }
    }

    //detect the payment method
    public function DoPayment(AddPaymentRequest $request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['payment'] = $request->payment;

        if ($request->payment === 'stripe') {
            return view('front.payment.stripe', compact('data'));
        } elseif ($request->payment === 'paypal') {
            echo "paypal";
        } elseif ($request->payment === 'ideal') {
            echo "ideal";
        } else {
            return redirect()->back()->with([
                'alert-type' => 'danger',
                'message' => 'Something went wrong, try again later'
            ]);
        }
    }

    //do stripe payment
    public function StripeCharge(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $total = $request->total;

        $charge = \Stripe\Charge::create([
            'amount' => $total * 100,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        $user_id = Auth::id();
        $data = [];
        $data['user_id'] = $user_id;
        $data['payment_id'] = $charge->payment_method;
        $data['payment_type'] = $request->payment_type;
        $data['paying_amount'] = $charge->amount;
        $data['balance_transaction'] = $charge->balance_transaction;
        $data['stripe_order_id'] = $charge->id;
        $data['total'] = $request->total;
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['status'] = 0;
        $data['status_code'] = mt_rand(100000, 999999);
        $data['month'] = date('F');
        $data['date'] = date('d-m-y');
        $data['year'] = date('Y');
        if (Session::has('coupon')) {
            $data['subtotal'] = Session::get('coupon')['balance'];
        } else {
            $data['subtotal'] = \Cart::subtotal();
        }

        $order_id = DB::table('orders')->insertGetId($data);

        $shipping = [];
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->ship_name;
        $shipping['ship_phone'] = $request->ship_phone;
        $shipping['ship_email'] = $request->ship_email;
        $shipping['ship_address'] = $request->ship_address;
        $shipping['ship_city'] = $request->ship_city;

        DB::table('shipping')->insert($shipping);


        $details = [];
        foreach (\Cart::content() as $row) {
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['color'] = $row->color;
            $details['size'] = $row->size;
            $details['quantity'] = $row->qty;
            $details['single_price'] = $row->price;
            $details['total_price'] = $row->qty * $row->price;

            DB::table('orders_details')->insert($details);
            //sent real time notification to admin with new purchases
            event(new NewPurchase($details));
        }
        \Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }


        return redirect()->route('frontpage')->with([
            'alert-type' => 'success',
            'message' => 'Order Process Successfully Done'
        ]);
    }

    // cart clear
    public function clear()
    {
        \Cart::destroy();
        return redirect()->route('cart')->with([
            'alert-type' => 'success',
            'message' => 'You cleared your cart successfully '
        ]);
    }
}
