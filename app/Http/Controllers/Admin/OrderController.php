<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function NewOrders()
    {
        $orders = DB::table('orders')->where('status', 0)->get();
        return view('admin.order.new', compact('orders'));
    }

    public function CanceledOrders()
    {
        $orders = DB::table('orders')->where('status', 4)->get();
        return view('admin.order.new', compact('orders'));
    }
    public function AcceptedOrders()
    {
        $orders = DB::table('orders')->where('status', 1)->get();
        return view('admin.order.new', compact('orders'));
    }
    public function ProgressedOrders()
    {
        $orders = DB::table('orders')->where('status', 2)->get();
        return view('admin.order.new', compact('orders'));
    }
    public function DelieveredOrders()
    {
        $orders = DB::table('orders')->where('status', 3)->get();
        return view('admin.order.new', compact('orders'));
    }
    public function show($id)
    {
        $order = DB::table('orders')
            ->join('users', 'orders.user_id', 'users.id')
            ->select('orders.*', 'users.name', 'users.email')
            ->where('orders.id', $id)
            ->first();

        $shipping = DB::table('shipping')
            ->where('order_id', $id)
            ->first();

        $details = DB::table('orders_details')
            ->join('products', 'orders_details.product_id', 'products.id')
            ->select('orders_details.*', 'products.image_one')
            ->where('orders_details.order_id', $id)
            ->get();

        return view('admin.order.show', compact('order', 'shipping', 'details'));
    }

    public function AcceptPayment($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        if (!$order) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => 'There is no order with such an id',
            ]);
        }

       DB::table('orders')->where('id', $id)->update(['status' => 1]);

        return redirect()->back()->with([
            'alert-type' => 'success',
            'message' => 'Order payment status updated successfully',
        ]);
    }

    public function CancelOrder($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        if (!$order) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => 'There is no order with such an id',
            ]);
        }
       DB::table('orders')->where('id', $id)->update(['status' => 4]);

        return redirect()->back()->with([
            'alert-type' => 'success',
            'message' => 'Order canceled successfully',
        ]);
    }

    public function StartDelievery($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        if (!$order) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => 'There is no order with such an id',
            ]);
        }
         DB::table('orders')->where('id', $id)->update(['status' => 2]);

        return redirect()->back()->with([
            'alert-type' => 'success',
            'message' => 'Order Delievery process started',
        ]);
    }
    public function DelieveryDone($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        if (!$order) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => 'There is no order with such an id',
            ]);
        }
        DB::table('orders')->where('id', $id)->update(['status' => 3]);

        return redirect()->back()->with([
            'alert-type' => 'success',
            'message' => 'Order Delievery process Done Successfully',
        ]);
    }

    public function track(Request $request)
    {
        $track = DB::table('orders')->where('status_code',$request->status_code)->first();
        if (!$track) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => 'There is no order with such a status code',
            ]);
        }

        return view('front.track', compact('track'));
    }
}
