<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCouponRequest;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function index()
    {
        $Coupons = Coupon::all();
        return view('admin.coupon.index', compact('Coupons'));
    }

    public function store(AddCouponRequest $request)
    {
        $coupon = Coupon::create([
            'code' => $request->code,
            'discount' => $request->discount
        ]);
        return redirect()->route('admin.coupons')->with([
            'message' => 'Coupon added successfully',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->route('admin.coupons')->with([
                'message' => 'There is no coupon with such an id'
            ]);
        }

        return view('admin.coupon.edit', compact('coupon'));
    }

    public function update(AddCouponRequest $request, $id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->route('admin.coupons')->with([
                'message' => 'There is no coupon with such an id'
            ]);
        }
        $coupon->update([
            'code' => $request->code,
            'discount' => $request->discount,
        ]);
        return redirect()->route('admin.coupons')->with([
            'message' => 'Coupon updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->route('admin.coupons')->with([
                'message' => 'There is no coupon with such an id'
            ]);
        }

        $coupon->delete();
        return redirect()->route('admin.coupons')->with([
            'message' => 'Coupon deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
