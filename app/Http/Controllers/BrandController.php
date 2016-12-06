<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('back.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('back.brands.create');
    }

    public function store(Request $request)
    {
//        $brand = new Brand;
//        $brand->name = $request->name;
//        $num = DB::select("SELECT max(id) from brand_names;");
//        dd($num->);
//
//        $brand->brand_image = $brand->id . '-' . $request->brand_image->getClientOriginalExtension();
//        $brand->save();
//
//        $location = public_path('/img/brands/' . $brand->brand_image);
//        Image::make($request->brand_image)->widen(300)->save($location);
//
//        return redirect()->route('brand.index');
    }
}