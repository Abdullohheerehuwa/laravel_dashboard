<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Charts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $chart = Charts::new('line', 'highcharts')
        //     ->setTitle("my chart")
        //     ->setLables(["ES", "FR", "RU"])
        //     ->setValues([100, 50, 25])
        //     ->setElementLable("Total users");
        // return view('home', ['chart' => $chart]);
    }
}
