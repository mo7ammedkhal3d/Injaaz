<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guests.index',['activeLink'=>'1']);
})->name('guests.index');

Route::get('/about',function(){
    return view('guests.about',['activeLink'=>'2','pageName'=>'عن إنجاز','pagetitle'=>'تعرف علينا أكثر']);
})->name('guests.about');

Route::get('/services',function(){
    return view('guests.services',['activeLink'=>'3','pageName'=>'الخدمات','pagetitle'=>'الخدمات التي نقدمها']);
})->name('guests.services');

Route::get('/testimonial',function(){
    return view('guests.testimonial',['activeLink'=>'4','pageName'=>'عملائنا','pagetitle'=>'ماذا قالوا عنا']);
})->name('guests.testimonial');

Route::get('/team',function(){
    return view('guests.team',['activeLink'=>'5','pageName'=>'الاعضاء','pagetitle'=>'تواصل مع الأعضاء']);
})->name('guests.team');

Route::get('/contact',function(){
    return view('guests.contact',['activeLink'=>'6','pageName'=>'تواصل معنا','pagetitle'=>'تواصل معنا']);
})->name('guests.contact');
