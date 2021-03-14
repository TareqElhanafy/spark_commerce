<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnController extends Controller
{
    public function requests()
    {
        $orders = DB::table('orders')->where('return_order', 1)->get();
        return view('admin.return.request', compact('orders'));
    }

    public function ReturnApprove($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        if (!$order) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => 'There is no order with such an id',
            ]);
        }
        DB::table('orders')->where('id', $id)->update(['return_order' => 2]);
        return redirect()->back()->with([
            'alert-type' => 'success',
            'message' => 'The return order Request has been approved successfully',
        ]);
    }

    public function All()
    {
        $orders = DB::table('orders')->where('return_order', 2)->get();
        return view('admin.return.all', compact('orders'));
    }
}
