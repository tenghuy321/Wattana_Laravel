<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductUnique;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductUniqueController extends Controller
{
        public function index()
    {
        $product_uniques = ProductUnique::get();

        return view('admin.product_uniques.index', compact('product_uniques'));
    }

    public function create()
    {
        return view('admin.product_uniques.create');
    }

    public function store(Request $request)
    {
        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
            ],
        ];
        $data['order'] = ProductUnique::max('order') + 1;

        $i = ProductUnique::create($data);

        return $i
            ? redirect()->route('product_unique.index')->with('success', 'ACreated successfully!')
            : redirect()->back()->with('error', 'Failed to created.')->withInput();
    }

    public function edit(string $id)
    {
        $product_unique = ProductUnique::findOrFail($id);
        return view('admin.product_uniques.edit', compact('product_unique'));
    }

    public function update(Request $request, string $id)
    {
        $product_unique = ProductUnique::findOrFail($id);
        $data = [
            'title' => [
                'en' => $request->input('title.en', ''),
                'kh' => $request->input('title.kh', ''),
            ],
        ];

        $i = $product_unique->update($data);

        return $i
            ? redirect()->route('product_unique.index')->with('success', 'Updated Successfully!')
            : redirect()->back()->with('succees', 'Failed to updated');
    }
    public function reorder(Request $request)
    {
        $newOrder = $request->newOrder;

        foreach ($newOrder as $item) {
            ProductUnique::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    public function delete(string $id)
    {
        $product_unique = ProductUnique::findOrFail($id);

        $deleted = $product_unique->delete();

        return $deleted
            ? redirect()->route('product_unique.index')->with('success', 'Deleted successfully!')
            : redirect()->back()->with('error', 'Failed to Deleted.');
    }
}
