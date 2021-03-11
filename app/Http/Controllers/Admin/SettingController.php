<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSettingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = DB::table('settings')->first();

        return view('admin.setting.index', compact('setting'));
    }

    public function store(AddSettingRequest $request)
    {
        $logo = $request->logo->store('settings');
        DB::table('settings')->insert([
            'vat' => $request->vat,
            'shipping_charge' => $request->shipping_charge,
            'shopname' => $request->shopname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'logo' => $logo,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
        ]);

        return redirect()->route('admin.settings')->with([
            'alert-type' => 'success',
            'message' => 'Site settings set successfully'
        ]);
    }

    public function edit($id)
    {
        $setting = DB::table('settings')->where('id', $id)->first();
        if (!$setting) {
            return redirect()->route('admin.settings')->with([
                'alert-type' => 'success',
                'message' => 'Settings is not set yet !'
            ]);
        }
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(AddSettingRequest $request, $id)
    {
        $setting = DB::table('settings')->where('id', $id)->first();
        if (!$setting) {
            return redirect()->route('admin.settings')->with([
                'alert-type' => 'success',
                'message' => 'Settings is not set yet !'
            ]);
        }
        if ($request->hasFile('logo')) {
            Storage::delete($setting->logo);
            $logo = $request->logo->store('settings');
        } else {
            $logo = $setting->logo;
        }
        DB::table('settings')->where('id', $id)->update([
            'vat' => $request->vat,
            'shipping_charge' => $request->shipping_charge,
            'shopname' => $request->shopname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'logo' => $logo,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
        ]);
        return redirect()->route('admin.settings')->with([
            'alert-type' => 'success',
            'message' => 'Site settings updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $setting = DB::table('settings')->where('id', $id)->first();
        if (!$setting) {
            return redirect()->route('admin.settings')->with([
                'alert-type' => 'success',
                'message' => 'Settings is not set yet !'
            ]);
        }
        Storage::delete($setting->logo);
        DB::table('settings')->truncate();
        return redirect()->route('admin.settings')->with([
            'alert-type' => 'success',
            'message' => 'Site settings deleted successfully'
        ]);
    }
}
