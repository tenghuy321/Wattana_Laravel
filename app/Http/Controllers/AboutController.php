<?php

namespace App\Http\Controllers;

use App\Models\Msg;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\AboutPage;
use App\Models\ContactUs;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutTitle = AboutPage::find(1);
        $aboutpage = AboutPage::where('id', '!=',1)->get();

        $contact = ContactUs::first();
        return view('about', compact('aboutTitle','contact', 'aboutpage'));
    }

    public function vision()
    {
        $aboutTitle = AboutPage::find(1);
        $aboutpage = AboutPage::where('id', '!=', 1)->get();

        $vision = Vision::first();
        $contact = ContactUs::first();
        return view('abouts.vision', compact('aboutTitle','contact', 'aboutpage', 'vision'));
    }

    public function mission()
    {
        $aboutTitle = AboutPage::find(1);
        $aboutpage = AboutPage::where('id', '!=',1)->get();

        $mission = Mission::first();
        $contact = ContactUs::first();
        return view('abouts.mission', compact('aboutTitle','contact', 'aboutpage', 'mission'));
    }

    public function coreValues()
    {
        $aboutTitle = AboutPage::find(1);
        $aboutpage = AboutPage::where('id', '!=',1)->get();

        $core_values = CoreValue::orderBy('order')->get();
        $contact = ContactUs::first();
        return view('abouts.coreValues', compact('aboutTitle','contact', 'aboutpage', 'core_values'));
    }

    public function msg()
    {
        $aboutTitle = AboutPage::find(1);
        $aboutpage = AboutPage::where('id', '!=', 1)->get();

        $msg = Msg::first();
        $contact = ContactUs::first();
        return view('abouts.msg', compact('aboutTitle','contact', 'aboutpage', 'msg'));
    }
}
