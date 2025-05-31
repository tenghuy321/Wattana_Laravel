<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\ContactUs;
use App\Models\ProductPage;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $data['contact'] = ContactUs::first();
        $data['productTitle'] = ProductPage::first();
        $data['nav'] = Nav::first();
        $data['navItem'] = Nav::where('id', '!=', '1')->orderBy('order')->get();

        $data['product_categories'] = ProductCategory::where('active', 1)->get();

        // Get the category filter (default to 'all' if no category is selected)
        $product_category = $request->query('product_category', 'all');

        $query = ProductImage::join('product_categories', 'product_images.product_category_id', '=', 'product_categories.id')
                        ->where('product_images.active', 1);

        // If a category is selected, filter by category
        if ($product_category !== 'all') {
            $query->where('product_categories.slug', $product_category);
        }

        $data['productImages'] = $query->select('product_images.*', 'product_categories.slug')->get();

        return view('products', $data);
    }
}
