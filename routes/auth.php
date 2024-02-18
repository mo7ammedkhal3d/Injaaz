<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login',function(){
    return view('auth.login');
})->name('auth.login');

Route::get('/register',function(){
    return view('auth.register');
})->name('auth.register');

Route::get('/terms',function(){
    return view('guests.conditionAndTerms');
})->name('gustes.terms');

Auth::routes();
