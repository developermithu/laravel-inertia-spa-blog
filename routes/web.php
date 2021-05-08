<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



// Frontend Page
Route::inertia('/', 'Home')->name('home');
Route::inertia('/about', 'About');
Route::inertia('/blog', 'Blog');
Route::inertia('/services', 'Services');
Route::inertia('/projects', 'Projects');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


// Contact
Route::get('contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('contact-us', [ContactController::class, 'sendMessage'])->name('contact.store');

//======== Admin Dashboard =========//
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
});



