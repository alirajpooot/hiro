<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::orderBy('sort')->get();
        return view('frontend.pages.homepage',['sliders' => $sliders]);
    }

    public function login()
    {
        return 'kk';
    }

    public function CompaniesByAlphabet($alpah = '')
    {
        if(empty($alpah))
        {
            $allcomps = Company::where('status', 1)->get();
        }
        else{
            $allcomps  = Company::where('company_name', 'like', $alpah.'%')->where('status', 1)->get();
        }
        return view('frontend.pages.companies',['allcomps' => $allcomps]);
    }
}
