<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\HeroBannerController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\admin\MsgController;
use App\Http\Controllers\Admin\NavController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductPageController;
use App\Http\Controllers\Admin\ProductUniqueController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\admin\ServicePageController;
use App\Http\Controllers\Admin\SubServicePageController;
use App\Http\Controllers\Admin\WhyUsController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {

    // homepage
    Route::resource('homepage', HomePageController::class)->except(['destroy', 'show']);

    // hero banner
    Route::resource('hero_banner', HeroBannerController::class)->except(['destroy', 'show']);
    Route::post('/hero_banner/reorder', [HeroBannerController::class, 'reorder'])->name('hero_banner.reorder');
    Route::get('hero_banner/delete/{id}', [HeroBannerController::class, 'delete'])->name('hero_banner.delete');


    // our client
    Route::resource('client', ClientController::class)->except(['destroy', 'show']);
    Route::post('/client/reorder', [ClientController::class, 'reorder'])->name('client.reorder');
    Route::get('client/delete/{id}', [ClientController::class, 'delete'])->name('client.delete');

    // product_unique
    Route::resource('product_unique', ProductUniqueController::class)->except(['destroy', 'show']);
    Route::post('/product_unique/reorder', [ProductUniqueController::class, 'reorder'])->name('product_unique.reorder');
    Route::get('product_unique/delete/{id}', [ProductUniqueController::class, 'delete'])->name('product_unique.delete');


    // about us
    Route::resource('aboutpage', AboutPageController::class)->except(['destroy', 'show']);

    // msg
    Route::resource('msg', MsgController::class)->except(['destroy', 'show']);

    // services
    Route::resource('servicepage', ServicePageController::class)->except(['destroy', 'show']);

    // service
    Route::resource('sub_servicepage', SubServicePageController::class)->except(['destroy', 'show']);
    Route::get('sub_servicepage/delete/{id}', [SubServicePageController::class, 'delete'])->name('sub_servicepage.delete');

    // why us
    Route::resource('why_us', WhyUsController::class)->except(['destroy', 'show']);
    Route::post('/why_us/reorder', [WhyUsController::class, 'reorder'])->name('why_us.reorder');
    Route::get('why_us/delete/{id}', [WhyUsController::class, 'delete'])->name('why_us.delete');

    // registration
    Route::resource('registration', RegistrationController::class)->except(['destroy', 'show']);
    Route::post('/registration/reorder', [RegistrationController::class, 'reorder'])->name('registration.reorder');
    Route::get('registration/delete/{id}', [RegistrationController::class, 'delete'])->name('registration.delete');

    Route::resource('contactUs', ContactUsController::class)->except(['destroy', 'show']);

    // product page
    Route::resource('productpage', ProductPageController::class)->except(['destroy', 'show']);

    // product categories
    Route::resource('product_category', ProductCategoryController::class)->except(['destroy', 'show']);
    Route::get('product_category/delete/{id}', [ProductCategoryController::class, 'delete'])->name('product_category.delete');

    // Products
    Route::resource('product_image', ProductImageController::class)->except(['destroy', 'show']);
    Route::get('product_image/delete/{id}', [ProductImageController::class, 'delete'])->name('product_image.delete');

    // nav
    Route::resource('nav', NavController::class)->except(['destroy', 'show']);
    Route::post('/nav/reorder', [NavController::class, 'reorder'])->name('nav.reorder');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
