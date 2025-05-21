<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = ContactUs::first();
        $nav = Nav::first();
        $navItem = Nav::where('id', '!=', '1')->get();
        return view('contact', compact('contact', 'nav', 'navItem'));
    }
}
