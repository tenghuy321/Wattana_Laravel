<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContactUsController extends Controller
{
    public function index()
    {
        $contact_us = ContactUs::get();

        return view('admin.contact_us.index', compact('contact_us'));
    }

    // public function create()
    // {
    //     return view('admin.contact_us.create');
    // }

    // public function store(Request $request)
    // {
    //     $data = [
    //         'title1' => [
    //             'en' => $request->input('title1.en', ''),
    //             'kh' => $request->input('title1.kh', ''),
    //         ],
    //         'title2' => [
    //             'en' => $request->input('title2.en', ''),
    //             'kh' => $request->input('title2.kh', ''),
    //         ],
    //         'title3' => [
    //             'en' => $request->input('title3.en', ''),
    //             'kh' => $request->input('title3.kh', ''),
    //         ],
    //         'sub_title' => [
    //             'en' => $request->input('sub_title.en', ''),
    //             'kh' => $request->input('sub_title.kh', ''),
    //         ],
    //         'location' => [
    //             'en' => $request->input('location.en', ''),
    //             'kh' => $request->input('location.kh', ''),
    //         ],
    //         'email' => $request->input('email', ''),
    //         'phone_number' => $request->input('phone_number', ''),
    //         'head_office' => $request->input('head_office', ''),
    //         'map_location' => $request->input('map_location', ''),
    //         'facebook' => $request->input('facebook', ''),
    //         'telegram' => $request->input('telegram', ''),
    //         'personal_telegram' => $request->input('personal_telegram', ''),
    //     ];

    //     if ($request->hasFile('image')) {
    //         $data['image'] = $request->file('image')->store('contact_us', 'custom');
    //     }

    //     $i = ContactUs::create($data);

    //     return $i
    //         ? redirect()->route('contactUs.index')->with('success', 'Contact has been created successfully!')
    //         : redirect()->back()->with('error', 'Failed to create Contact.')->withInput();
    // }

    public function edit(string $id)
    {
        $contact = ContactUs::findOrFail($id);
        return view('admin.contact_us.edit', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $contact = ContactUs::findOrFail($id);
        $data = [
            'title1' => [
                'en' => $request->input('title1.en', ''),
                'kh' => $request->input('title1.kh', ''),
            ],
            'title2' => [
                'en' => $request->input('title2.en', ''),
                'kh' => $request->input('title2.kh', ''),
            ],
            'title3' => [
                'en' => $request->input('title3.en', ''),
                'kh' => $request->input('title3.kh', ''),
            ],
            'sub_title' => [
                'en' => $request->input('sub_title.en', ''),
                'kh' => $request->input('sub_title.kh', ''),
            ],
            'location' => [
                'en' => $request->input('location.en', ''),
                'kh' => $request->input('location.kh', ''),
            ],
            'email' => $request->input('email', ''),
            'phone_number' => $request->input('phone_number', ''),
            'head_office' => $request->input('head_office', ''),
            'map_location' => $request->input('map_location', ''),
            'facebook' => $request->input('facebook', ''),
            'telegram' => $request->input('telegram', ''),
            'personal_telegram' => $request->input('personal_telegram', ''),
        ];


        if ($request->hasFile('image')) {
            if ($contact->image && Storage::disk('custom')->exists($contact->image)) {
                Storage::disk('custom')->delete($contact->image);
            }

            $data['image'] = $request->file('image')->store('contact_us', 'custom');
        }

        $i = $contact->update($data);

        return $i
            ? redirect()->route('contactUs.index')->with('success', 'Contact Us has been updated')
            : redirect()->back()->with('succees', 'Failed to update Contact Us');
    }
}
