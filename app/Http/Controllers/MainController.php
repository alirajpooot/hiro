<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
    	return view('frontend.pages.homepage');
    }

    public function login()
    {
    	return view('frontend.pages.login');
    }
}
