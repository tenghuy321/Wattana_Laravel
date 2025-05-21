<?php

namespace App\Http\Controllers;

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
        return view('home', compact('homes','heroBanner', 'contact'));
    }
}
