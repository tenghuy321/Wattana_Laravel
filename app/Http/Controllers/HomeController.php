<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\HomePage;
use App\Models\ContactUs;
use App\Models\HeroBanner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $homes = HomePage::first();
        $heroBanner = HeroBanner::orderBy('order')->get();

        $contact = ContactUs::first();
        $nav = Nav::first();
        $navItem = Nav::where('id', '!=', '1')->orderBy('order')->get();
        return view('home', compact('homes','heroBanner', 'contact', 'nav', 'navItem'));
    }
}
