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
    public function index()
    {
        $data['contact'] = ContactUs::first();
        $data['productTitle'] = ProductPage::first();
        $data['nav'] = Nav::first();
        $data['navItem'] = Nav::where('id', '!=', '1')->get();
        $data['product_category'] = ProductCategory::where('active', 1)->get();

        $defaultSlug = $data['product_category']->first()->slug ?? null;
        $selectedSlug = request('product_category', $defaultSlug);

        $data['selectedCategorySlug'] = $selectedSlug;

        $data['productImages'] = ProductImage::join('product_categories', 'product_images.product_category_id', '=', 'product_categories.id')
            ->where('product_images.active', 1)
            ->where('product_categories.slug', $selectedSlug)
            ->select('product_images.*', 'product_categories.slug as category_slug')
            ->get();

        return view('products', $data);
    }
}
