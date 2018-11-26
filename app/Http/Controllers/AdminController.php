<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
//        dd($analyticsData);
        
        return view('admin.home.home');
    }

    private function weeklyReport()
    {
        $thisWeekVisitor = Analytics::thisWeekVisitor();
        $lastWeekVisitor = Analytics::lastWeekVisitor();


    }
}
