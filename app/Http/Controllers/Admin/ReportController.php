<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function TodayOrders()
    {
        $today = date('d-m-y');
        $orders = DB::table('orders')->where('date', $today)->where('status', 0)->get();
        return view('admin.report.today_order', compact('orders'));
    }

    public function TodayDelievery()
    {
        $today = date('d-m-y');
        $orders = DB::table('orders')->where('date', $today)->where('status', 3)->get();
        return view('admin.report.today_delievery', compact('orders'));
    }

    public function Search()
    {
        return view('admin.report.search');
    }

    public function SearchByDate(Request $request)
    {
        $orders = DB::table('orders')->where('date', $request->date)->where('status', 3)->get();
        $total = DB::table('orders')->where('date', $request->date)->where('status', 3)->sum('total');
        return view('admin.report.search_by_date', compact('orders', 'total'));
    }
    public function SearchByYear(Request $request)
    {
        $orders = DB::table('orders')->where('year', $request->year)->where('status', 3)->get();
        $total = DB::table('orders')->where('year', $request->year)->where('status', 3)->sum('total');
        return view('admin.report.search_by_year', compact('orders', 'total'));
    }
    public function SearchByMonth(Request $request)
    {
        $orders = DB::table('orders')->where('month', $request->month)->where('status', 3)->get();
        $total = DB::table('orders')->where('month', $request->month)->where('status', 3)->sum('total');
        return view('admin.report.search_by_month', compact('orders', 'total'));
    }
}
