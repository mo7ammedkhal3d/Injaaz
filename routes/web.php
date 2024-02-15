<?php

use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BoardListController;
use App\Http\Controllers\CardAssignedController;
use App\Http\Controllers\CardCommentController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Mail\InvitationMail;
use App\Models\Board;
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

Route::group(['middleware' => ['auth', 'checkUserId'],'prefix'=>'dashboard/{userId}'], function () {
Route::get('',[BoardController::class, 'index'])->name('dashboard.index');
Route::get('lists/{board_id}', [BoardController::class, 'show'])->name('dashboard.lists');
Route::get('card/{card_id}', [CardController::class, 'index'])->name('dashboard.getCardDetails');
Route::post('cardAssigned/add', [CardAssignedController::class, 'addCardAssigned'])->name('dashboard.addCardAssigned');
Route::post('cardAssigned/delete', [CardAssignedController::class, 'deleteCardAssigned'])->name('dashboard.deleteCardAssigned');
Route::post('card/create', [CardController::class, 'store'])->name('dashboard.createCard');
Route::post('card/update', [CardController::class, 'update'])->name('dashboard.updateCard');
Route::post('list/create', [BoardListController::class, 'store'])->name('dashboard.createList');
Route::post('comment/create', [CardCommentController::class, 'store'])->name('dashboard.createComment');
Route::get('users/getAll', [UserController::class, 'getAll'])->name('dashboard.getAllUsers');
Route::post('board/create', [BoardController::class, 'store'])->name('dashboard.createBoard');
Route::get('notification/getAll', [NotificationController::class, 'getAll'])->name('getAllUserNotification');
Route::get('notification/getNew', [NotificationController::class, 'getNew'])->name('getNewUserNotification');
Route::post('notification/moveToStack', [NotificationController::class, 'moveToStack'])->name('NotificationMoveToStack');
Route::get('notification/changeReadState', [NotificationController::class, 'changeReadState'])->name('NotificationChangeReadState');
Route::post('notification/updateNotificationState', [NotificationController::class, 'updateNotificationState'])->name('updateNotificationState');
Route::post('notification/deleteNotification', [NotificationController::class, 'delete'])->name('deleteNotification');
Route::get('getUserProfile/local',[UserController::class, 'jsonGetUserProfile'])->name('localGetUserProfile');
Route::post('saveProfile',[UserController::class, 'saveProfile'])->name('saveProfile');
Route::get('getUserBoards/local',[UserController::class, 'jsonGetUserBoards'])->name('localGetUserBoards');
Route::get('getUserCards/local',[UserController::class, 'jsonGetUserCards'])->name('localGetUserCards');
Route::get('getUserProfile', [UserController::class, 'viewGetUserProfile'])->name('viewGetUserProfile');
Route::get('getUserBoards',[UserController::class, 'viewGetUserBoards'])->name('viewGetUserBoards');
Route::get('getUserCards',[UserController::class, 'viewGetUserCards'])->name('viewGetUserCards');
Route::get('account/settings',[AccountSettingsController::class ,'index'])->name('account.settings');
Route::post('account/settings/update', [AccountSettingsController::class, 'update'])->name('account.settings.update');
Route::get('board/generalSettings/{board_id}',[BoardController::class, 'generalSettings'])->name('board.generalSettings');
Route::get('board/boardMembres/{board_id}',[BoardController::class, 'boardMembres'])->name('board.boardMembres');
Route::post('board/generalSettings/update',[BoardController::class, 'updategeneralSettings'])->name('board.updategeneralSettings');
Route::post('board/boardmember/delete',[BoardController::class, 'delelteBoardMember'])->name('board.delelteBoardMember');
Route::get('users/getUninvite/{board_id}',[UserController::class, 'getUninvite'])->name('board.getUninvite');
Route::Post('board/sendInvitation',[BoardController::class, 'sendInvitation'])->name('board.sendInvitation');
Route::Post('board/deleteForMe',[BoardController::class, 'deleteForMe'])->name('board.deleteForMe');
Route::Post('card/updatePosition',[CardController::class, 'updatePosition'])->name('card.updatePosition');
Route::Post('card/updateList',[CardController::class, 'updateList'])->name('card.updateList');
});

Route::get('/dashboard/board', function (){
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



Route::get('/terms',function(){
    return view('gustes.conditionAndTerms');
})->name('gustes.terms');

Route::get('/home', [HomeController::class, 'index'])->name('home');
