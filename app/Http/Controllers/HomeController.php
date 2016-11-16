<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MarketName;

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
      return view('front.home', compact('markets'));
    }
}
