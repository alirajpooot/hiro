<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Company;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        return view('home');
    }

    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('home');
        }
    }

    public function Services()
    {
        return view('frontend.pages.userdash.services');
    }

    public function Links()
    {
        return view('frontend.pages.userdash.links');
    }

    public function Password()
    {
        return view('frontend.pages.userdash.changepassword');
    }
}
