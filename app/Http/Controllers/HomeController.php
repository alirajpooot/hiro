<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Company;
use Auth;
use App\UserDetail;

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
        // dd("Aa");
        $userDetail = UserDetail::where('user_id',Auth::user()->id)->first();
        return view('home',compact('userDetail'));
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
        $userDetail = UserDetail::where('user_id',Auth::user()->id)->first();
        return view('frontend.pages.userdash.links',compact('userDetail'));
    }

    public function Password()
    {
        return view('frontend.pages.userdash.changepassword');
    }
}
