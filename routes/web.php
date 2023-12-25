<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('gustes.index');
})->name('gustes.index');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard.index');

Route::fallback(FUNCTION(){
    return view('errors.404');
})->name('errors.404');

Route::get('/login',function(){
    return view('front.login');
})->name('front.login');

Route::get('/register',function(){
    return view('front.register');
})->name('front.register');

Route::get('/about',function(){
    return view('gustes.about');
})->name('gustes.about');

Route::get('/contact',function(){
    return view('gustes.contact');
})->name('gustes.contact');

Route::get('/project',function(){
    return view('gustes.project');
})->name('gustes.project');

Route::get('/services',function(){
    return view('gustes.services');
})->name('gustes.services');

Route::get('/team',function(){
    return view('gustes.team');
})->name('gustes.team');

Route::get('/testimonial',function(){
    return view('gustes.testimonial');
})->name('gustes.testimonial');
