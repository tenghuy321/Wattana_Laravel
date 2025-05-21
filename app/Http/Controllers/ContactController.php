<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = ContactUs::first();

        return view('contact', compact('contact'));
    }
}
