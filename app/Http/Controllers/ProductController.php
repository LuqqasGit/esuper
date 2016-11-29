<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Market;
use App\Product_Types;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('back.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $product_types = Product_Types::all();
        $markets = Market::join('market_names', 'markets.name_id', '=', 'market_names.id')->select('markets.*', 'market_names.name')->get();
        return view('back.products.create', compact('markets', 'brands', 'product_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = New Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->market_id = $request->market_id;
        if(Brand::find($request->brand_id)) {
            $product->brand_id = $request->brand_id;
        } else {
            $brand = New Brand();
            $brand->name = $request->brand_id;
            $brand->save();
            $product->brand_id = $brand->id;
        }
        if(Product_Types::find($request->type_id)) {
            $product->type_id = $request->type_id;
        } else {
            $product_type = New Product_Types();
            $product_type->name = $request->type_id;
            $product_type->save();
            $product->type_id = $product_type->id;
        }
        $product->description = $request->description;
        $product->save();
//        Product::create($request->all());
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $markets = Market::all();
        $product_types = Product_Types::all();
        return view('back.products.edit', compact('product', 'brands', 'markets', 'product_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->market_id = $request->market_id;
        if(Brand::find($request->brand_id)) {
            $product->brand_id = $request->brand_id;
        } else {
            $brand = New Brand();
            $brand->name = $request->brand_id;
            $brand->save();
            $product->brand_id = $brand->id;
        }
        if(Product_Types::find($request->type_id)) {
            $product->type_id = $request->type_id;
        } else {
            $product_type = New Product_Types();
            $product_type->name = $request->type_id;
            $product_type->save();
            $product->type_id = $product_type->id;
        }
        $product->description = $request->description;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
