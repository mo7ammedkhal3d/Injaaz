<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guests.index',['activeLink'=>'1']);
})->name('guests.index');

Route::get('/about',function(){
    return view('guests.about',['activeLink'=>'2','pagetitle'=>'تعرف علينا أكثر']);
})->name('guests.about');

Route::get('/services',function(){
    return view('guests.services',['activeLink'=>'3','pagetitle'=>'الخدمات التي نقدمها']);
})->name('guests.services');

Route::get('/testimonial',function(){
    return view('guests.testimonial',['activeLink'=>'4','pagetitle'=>'ماذا قالوا عنا']);
})->name('guests.testimonial');

Route::get('/team',function(){
    return view('guests.team',['activeLink'=>'5','pagetitle'=>'تواصل مع الأعضاء']);
})->name('guests.team');

Route::get('/contact',function(){
    return view('guests.contact',['activeLink'=>'6','pagetitle'=>'تواصل معنا']);
})->name('guests.contact');
