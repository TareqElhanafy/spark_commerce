<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function store(AddBrandRequest $request)
    {
        if ($request->has('logo')) {
            $logo = $request->logo->store('brands');
        }
        $brand = Brand::create([
            'name' => $request->name,
            'logo' => $logo,
        ]);
        return redirect()->route('admin.brands')->with([
            'message' => 'Brand added succcessfully',
            'alert-type' => 'success',
        ]);
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brands')->with([
                'message' => 'There is no brand with such an id',
                'alert-type' => 'error'
            ]);
        }

        return view('admin.brand.edit', compact('brand'));
    }

    public function update(AddBrandRequest $request, $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brands')->with([
                'message' => 'There is no brand with such an id',
                'alert-type' => 'error'
            ]);
        }

        if ($request->has('logo')) {
            Storage::delete($brand->logo);
            $logo = $request->logo->store('brands');
        } else {
            $logo = $brand->logo;
        }

        $brand->update([
            'name' => $request->name,
            'logo' => $logo,
        ]);

        return redirect()->route('admin.brands')->with([
            'message' => 'Brand updated succcessfully',
            'alert-type' => 'success',
        ]);
    }
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brands')->with([
                'message' => 'There is no brand with such an id',
                'alert-type' => 'error'
            ]);
        }
        Storage::delete($brand->logo);
        $brand->delete();
        return redirect()->route('admin.brands')->with([
            'message' => 'Brand deleted succcessfully',
            'alert-type' => 'success',
        ]);
    }
}
