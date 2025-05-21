<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\ProductPage;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
        public function index()
    {
        $productpages = ProductPage::get();
        return view('admin.productpages.index', compact('productpages'));
    }

    // public function create()
    // {
    //     return view('admin.productpages.create');
    // }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title.en' => 'required|max:255',
    //         'title.kh' => 'required|max:255',
    //         'content.en' => 'required|string',
    //         'content.kh' => 'required|string',
    //     ]);

    //     $data = [
    //         'title' => [
    //             'en' => $validated['title']['en'],
    //             'kh' => $validated['title']['kh'],
    //         ],
    //         'content' => [
    //             'en' => $validated['content']['en'],
    //             'kh' => $validated['content']['kh'],
    //         ],
    //     ];

    //     $i = ProductPage::create($data);

    //     return $i
    //         ? redirect()->route('productpage.index')->with('success', 'Product Content created successfully.')
    //         : redirect()->back()->with('error', 'Failed to created');
    // }

    public function edit(string $id)
    {
        $productpage = ProductPage::findOrFail($id);

        return view('admin.productpages.edit', compact('productpage'));
    }

    public function update(Request $request, string $id)
    {
        $productpage = ProductPage::findOrFail($id);

        $validated = $request->validate([
            'title.en' => 'nullable|max:255',
            'title.kh' => 'nullable|max:255',
            'content.en' => 'nullable|string',
            'content.kh' => 'nullable|string',
        ]);

        $data = [
            'title' => [
                'en' => $validated['title']['en'] ?? '',
                'kh' => $validated['title']['kh'] ?? '',
            ],
            'content' => [
                'en' => $validated['content']['en'] ?? '',
                'kh' => $validated['content']['kh'] ?? '',
            ],
        ];

        $i = $productpage->update($data);

        return $i
            ? redirect()->route('productpage.index')->with('success', 'Product Content has been updated')
            : redirect()->back()->with('error', 'Failed to updated');
    }
}
