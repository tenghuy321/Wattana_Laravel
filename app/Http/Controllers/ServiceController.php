<?php

namespace App\Http\Controllers;

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

        return view('service', compact('services', 'contact'));
    }

    public function ourService() {
        $services = ServicePage::get();
        $sub_service = SubServicePage::get();
        $contact = ContactUs::first();

        return view('services.ourService', compact('services', 'sub_service', 'contact'));
    }

    public function whyUs() {
        $services = ServicePage::get();
        $why_us = WhyUs::orderBy('order')->get();
        $contact = ContactUs::first();

        return view('services.whyUs', compact('services', 'why_us', 'contact'));
    }

    public function registration() {
        $services = ServicePage::get();
        $registration = Registration::orderBy('order')->get();
        $contact = ContactUs::first();

        return view('services.registration', compact('services', 'registration', 'contact'));
    }

}
