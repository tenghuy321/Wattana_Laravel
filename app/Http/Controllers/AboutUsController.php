<?php

namespace App\Http\Controllers;

use App\Models\AboutList;
use App\Models\Nav;
use App\Models\WhyUs;
use App\Models\HomePage;
use App\Models\AboutPage;
use App\Models\ContactUs;
use App\Models\HeroBanner;
use App\Models\Registration;
use App\Models\ServicePage;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $data['homes'] = HomePage::first();
        $data['heroBanner'] = HeroBanner::orderBy('order')->get();
        $data['aboutTitle'] = AboutPage::find(1);
        $data['aboutpage'] = AboutPage::where('id', '!=', 1)->get();
        $data['service_why_us'] = ServicePage::find(2);
        $data['contact'] = ContactUs::first();
        $data['vision'] = AboutList::find(1);
        $data['mission'] = AboutList::find(2);
        $data['regi_title'] = AboutList::find(3);
        $data['regi'] = Registration::orderBy('order')->get();

        $data['why_us'] = WhyUs::orderBy('order')->get();
        $data['nav'] = Nav::first();

        return view('about-us', $data);
    }
}
