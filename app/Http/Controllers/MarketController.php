<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;
use App\MarketName;
use App\Product;

class MarketController extends Controller
{


    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name_id)
    {
        $markets = Market::where('name_id', $name_id)->get();
        $marketname = MarketName::where('id', $name_id)->get();
        return view('front.markets.index', compact('markets'), compact('marketname'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marketNames = MarketName::all();
        return view('back.markets.create', compact('marketNames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $market = New Market();
        if(is_numeric($request->name_id)) {
            $market->name_id = $request->name_id;
        } else {
            $marketName = New MarketName();
            $marketName->name = $request->name_id;
            $marketName->save();
            $market->name_id = $marketName->id;
        }
        $market->lat = $request->lat;
        $market->lng = $request->lng;
        $market->address = $request->address;
        $market->save();
        return redirect()->route('markets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($name_id, $id)
    {
        $market = Market::where([
            ['name_id', $name_id],
            ['id', $id],
        ])->first();
        if (!$market) {
            abort(404);
        }
        $products = Product::where('market_id', '=', $id)->get();
        return view('front.markets.show', compact('market'), compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        $marketNames = MarketName::all();
        $name = MarketName::find($market->name_id)->name;
        return view('back.markets.edit', compact('market', 'marketNames', 'name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Market $market)
    {
        $market->name_id = $request->name_id;
        if (MarketName::find($request->name_id)) {
            $market->name_id = $request->name_id;
        } else {
            $marketName = New MarketName();
            $marketName->name = $request->name_id;
            $marketName->save();
            $market->name_id = $marketName->id;
        }
        $market->lat = $request->lat;
        $market->lng = $request->lng;
        $market->address = $request->address;
        $market->save();
        return redirect()->route('markets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Market $market)
    {
        $market->delete();
        return redirect()->route('markets');
    }


    public function getMarkets()
    {
        $markets = Market::join('market_names', 'markets.name_id', '=', 'market_names.id')->select('markets.*', 'market_names.name')->get();
        foreach ($markets as $market) {
            $marketsArray[] = ['id' => $market->id, 'name' => $market->name, 'lat' => $market->lat, 'lng' => $market->lng, 'name_id' => $market->name_id, 'address' => $market->address];
        }
        return $marketsArray;
    }

    public function markets()
    {
        $markets = Market::all();
        $marketNames = MarketName::all();
        return view('back.markets.index', compact('markets', 'marketNames'));
    }


}
