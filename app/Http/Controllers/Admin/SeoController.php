<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSeoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeoController extends Controller
{
    public function index()
    {
        $seo = DB::table('seos')->first();
        return view('admin.seo.index', compact('seo'));
    }

    public function store(AddSeoRequest $request)
    {
        $seo = DB::table('seos')->insert([
            'meta_author' => $request->meta_author,
            'meta_title' => $request->meta_title,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
            'bing_analytics' => $request->bing_analytics

        ]);

        return redirect()->route('admin.seo')->with([
            'alert-type' => 'success',
            'message' => 'New Seo added successfully'
        ]);
    }

    public function edit($id)
    {
        $seo = DB::table('seos')->where('id', $id)->first();
        if (!$seo) {
            return redirect()->route('admin.seo')->with([
                'alert-type' => 'error',
                'message' => 'There is no seo with such an id'
            ]);
        }

        return view('admin.seo.edit', compact('seo'));
    }

    public function update(AddSeoRequest $request, $id)
    {
        $seo = DB::table('seos')->where('id', $id)->first();
        if (!$seo) {
            return redirect()->route('admin.seo')->with([
                'alert-type' => 'error',
                'message' => 'There is no seo with such an id'
            ]);
        }

        $seo = DB::table('seos')->where('id', $id)->update([
            'meta_author' => $request->meta_author,
            'meta_title' => $request->meta_title,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
            'bing_analytics' => $request->bing_analytics
        ]);
        return redirect()->route('admin.seo')->with([
            'alert-type' => 'success',
            'message' => 'Seo updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $seo = DB::table('seos')->where('id', $id)->first();
        if (!$seo) {
            return redirect()->route('admin.seo')->with([
                'alert-type' => 'error',
                'message' => 'There is no seo with such an id'
            ]);
        }

        DB::table('seos')->where('id', $id)->delete();
        return redirect()->route('admin.seo')->with([
            'alert-type' => 'success',
            'message' => 'Seo deleted successfully'
        ]);
    }
}
