<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\WhyUs;
use App\Models\ContactUs;
use App\Models\ServicePage;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\SubServicePage;

class ServiceController extends Controller
{
    public function index(){
        $services = ServicePage::get();
        $contact = ContactUs::first();
        $nav = Nav::first();
        $navItem = Nav::where('id', '!=', '1')->orderBy('order')->get();
        return view('service', compact('services', 'nav', 'navItem', 'contact'));
    }

    public function ourService() {
        $services = ServicePage::get();
        $sub_service = SubServicePage::get();
        $contact = ContactUs::first();
        $nav = Nav::first();
        $navItem = Nav::where('id', '!=', '1')->orderBy('order')->get();
        return view('services.ourService', compact('services', 'nav', 'navItem', 'sub_service', 'contact'));
    }

    public function whyUs() {
        $services = ServicePage::get();
        $why_us = WhyUs::orderBy('order')->get();
        $contact = ContactUs::first();
        $nav = Nav::first();
        $navItem = Nav::where('id', '!=', '1')->orderBy('order')->get();
        return view('services.whyUs', compact('services', 'nav', 'navItem', 'why_us', 'contact'));
    }

    public function registration() {
        $services = ServicePage::get();
        $registration = Registration::orderBy('order')->get();
        $contact = ContactUs::first();
        $nav = Nav::first();
        $navItem = Nav::where('id', '!=', '1')->orderBy('order')->get();
        return view('services.registration', compact('services', 'nav', 'navItem', 'registration', 'contact'));
    }

}
