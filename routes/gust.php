<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('gustes.index',['activeLink'=>'1','pageName'=>'الرئيسية']);
})->name('gustes.index');

Route::get('/about',function(){
    return view('gustes.about',['activeLink'=>'2','pageName'=>'عن إنجاز','pagetitle'=>'تعرف علينا أكثر']);
})->name('gustes.about');

Route::get('/services',function(){
    return view('gustes.services',['activeLink'=>'3','pageName'=>'الخدمات','pagetitle'=>'الخدمات التي نقدمها']);
})->name('gustes.services');

Route::get('/testimonial',function(){
    return view('gustes.testimonial',['activeLink'=>'4','pageName'=>'عملائنا','pagetitle'=>'ماذا قالوا عنا']);
})->name('gustes.testimonial');

Route::get('/team',function(){
    return view('gustes.team',['activeLink'=>'5','pageName'=>'الأعضاء','pagetitle'=>'تواصل مع الأعضاء']);
})->name('gustes.team');

Route::get('/contact',function(){
    return view('gustes.contact',['activeLink'=>'6','pageName'=>'تواصل معنا','pagetitle'=>'تواصل معنا']);
})->name('gustes.contact');
