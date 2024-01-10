<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\BoardListController;
use App\Http\Controllers\CardAssignedController;
use App\Http\Controllers\CardCommentController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
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
    return view('gustes.index',['activeLink'=>'1','pageName'=>'الرئيسية']);
})->name('gustes.index');

Route::get('/dashboard/{userId}', [BoardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/{board_id}/lists', [BoardController::class, 'show'])->name('dashboard.lists');
Route::get('/dashboard/{userId}/card/{card_id}', [CardController::class, 'index'])->name('dashboard.getCardDetails');
Route::post('/dashboard/{userId}/cardAssigned/add', [CardAssignedController::class, 'addCardAssigned'])->name('dashboard.addCardAssigned');
Route::post('/dashboard/{userId}/cardAssigned/delete', [CardAssignedController::class, 'deleteCardAssigned'])->name('dashboard.deleteCardAssigned');
Route::post('/dashboard/{userId}/card/create', [CardController::class, 'store'])->name('dashboard.createCard');
Route::post('/dashboard/{userId}/card/update', [CardController::class, 'update'])->name('dashboard.updateCard');
Route::post('/dashboard/{userId}/list/create', [BoardListController::class, 'store'])->name('dashboard.createList');
Route::post('/dashboard/{userId}/comment/create', [CardCommentController::class, 'store'])->name('dashboard.createComment');
Route::get('/dashboard/{userId}/users/getAll', [UserController::class, 'getAll'])->name('dashboard.getAllUsers');
Route::post('/dashboard/{userId}/board/create', [BoardController::class, 'store'])->name('dashboard.createBoard');
Route::get('/dashboard/{userId}/notification/getNew', [NotificationController::class, 'getNew'])->name('getNewUserNotification');
Route::post('/dashboard/{userId}/notification/moveToStack', [NotificationController::class, 'moveToStack'])->name('NotificationMoveToStack');
Route::get('/dashboard/{userId}/notification/changeReadState', [NotificationController::class, 'changeReadState'])->name('NotificationChangeReadState');
Route::post('/dashboard/{userId}/notification/updateNotificationState', [NotificationController::class, 'updateNotificationState'])->name('updateNotificationState');
Route::get('/dashboard/board', function () {
    return view('dashboard.board');
})->name('dashboard.board');

Route::fallback(FUNCTION(){
    return view('errors.404');
})->name('errors.404');

Route::get('/login',function(){
    return view('auth.login');
})->name('auth.login');

Route::get('/register',function(){
    return view('auth.register');
})->name('auth.register');

Route::get('/about',function(){
    return view('gustes.about',['activeLink'=>'2','pageName'=>'عن إنجاز']);
})->name('gustes.about');

Route::get('/contact',function(){
    return view('gustes.contact',['activeLink'=>'6','pageName'=>'تواصل معنا']);
})->name('gustes.contact');

Route::get('/project',function(){
    return view('gustes.project',['activeLink'=>'4','pageName'=>'المشاريع']);
})->name('gustes.project');

Route::get('/services',function(){
    return view('gustes.services',['activeLink'=>'3','pageName'=>'الخدمات']);
})->name('gustes.services');

Route::get('/team',function(){
    return view('gustes.team',['activeLink'=>'5','pageName'=>'الأعضاء']);
})->name('gustes.team');

Route::get('/testimonial',function(){
    return view('gustes.testimonial',['activeLink'=>'5','pageName'=>'عملائنا']);
})->name('gustes.testimonial');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
