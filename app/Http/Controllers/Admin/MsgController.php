<?php

namespace App\Http\Controllers\Admin;

use App\Models\Msg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MsgController extends Controller
{
    public function index()
    {
        $msgs = Msg::get();

        return view('admin.msgs.index', compact('msgs'));
    }

    // public function create()
    // {
    //     return view('admin.msgs.create');
    // }

    // public function store(Request $request)
    // {
    //     $data = [
    //         'title' => [
    //             'en' => $request->input('title.en', ''),
    //             'kh' => $request->input('title.kh', ''),
    //         ],
    //         'content' => [
    //             'en' => $request->input('content.en', ''),
    //             'kh' => $request->input('content.kh', ''),
    //         ]
    //     ];

    //     if ($request->hasFile('image')) {
    //         $data['image'] = $request->file('image')->store('aboutpages', 'custom');
    //     }

    //     $i = Msg::create($data);

    //     return $i
    //         ? redirect()->route('msg.index')->with('success', 'Msg has been created successfully!')
    //         : redirect()->back()->with('error', 'Failed to create Msg.')->withInput();
    // }

    public function edit(string $id)
    {
        $msg = Msg::findOrFail($id);
        return view('admin.msgs.edit', compact('msg'));
    }

    public function update(Request $request, string $id)
    {
        $msg = Msg::findOrFail($id);
        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
            ],
            'content' => [
                'en' => $request->input('content.en'),
                'kh' => $request->input('content.kh'),
            ],
        ];

        if($request->hasFile('image')){
            if($msg->image && Storage::disk('custom')->exists($msg->image)){
                Storage::disk('custom')->delete($msg->image);
            }

            $data['image'] = $request->file('image')->store('aboutpages', 'custom');
        }

        $i = $msg->update($data);

        return $i
            ? redirect()->route('aboutpage.index')->with('success', 'Msg has been updated')
            : redirect()->back()->with('succees', 'Failed to update Msg');
    }
}
