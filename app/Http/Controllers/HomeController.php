<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MarketName;
use App\Market;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
      $markets = MarketName::all();
        foreach ($markets as $market) {
          $count = Market::where('name_id', '=', $market->id)->count();
          $marketcount[$market->id] = $count;
        }
      return view('front.home', compact('markets'), compact('marketcount'));
    }

    public function backhome()
    {
        return view('back.backhome');
    }
}
