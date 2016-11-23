<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;

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
  public function index()
  {
    $markets = Market::all();
    return view('front.markets.markets', compact('markets'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function indexUnique($name_id)
  {
    $markets = Market::where('name_id', $name_id)->get();
    return view('front.markets.markets', compact('markets'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($name_id, $id)
  {
    $market = Market::find($id);
    return view('front.markets.market', compact('market'));
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }

  public function getMarkets()
  {
    $markets = Market::join('market_names', 'markets.name_id', '=', 'market_names.id')->select('markets.*', 'market_names.name')->get();
    foreach ($markets as $market) {
      $marketsArray[] = [$market->name, $market->lat, $market->lng];
    }
    return $marketsArray;
  }
}
