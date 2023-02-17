<?php

use App\Events\publicEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/profile', function () {
    return view('manager.profile');
})->middleware('auth');

// show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store'])->middleware('auth');;

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Group chat
Route::get('/groups', [ChatController::class, 'groups'])->middleware('auth');

// people search Chat
Route::get('/', [ChatController::class, 'people'])->middleware('auth');

// Chat page
Route::get('/chat', function () {
    return view('chat.chatPage');
})->middleware('auth');

// edit Profile
Route::put('/editProfile', [UserController::class, 'editProfile'])->middleware('auth');

// New account page
Route::get('/CreateAccount', function() {
    return view('admin.createAccount');
})->middleware('auth');

// Create account
Route::post('/createAccount', [UserController::class, 'createAccount'])->middleware('auth');

// New company
Route::get('/CreateCompany', function() {
    return view('admin.createCompany');
})->middleware('auth');

// Company Profile
Route::get('/companyProfile', function() {
    return view('manager.companyProfile');
})->middleware('auth');

// Update Company
Route::put('/updateCompany', [CompanyController::class, 'updateCompany'])->middleware('auth');

// Create Company
Route::post('/createCompany', [CompanyController::class, 'createCompany'])->middleware('auth');

// view active
Route::get('/editActiveCompany', function() {
    return view('admin.active');
})->middleware('auth');

// avctive company
Route::put('/activeCompany', [CompanyController::class, 'activeCompany'])->middleware('auth');

// Websocket 
if (App::environment('local')) {
    Route::get('/chat', function() {
        return view('chat/chatPage');
    })->middleware('auth');

    Route::post('/chat-message', function(Request $request) {
        event(new publicEvent($request->message, Auth::user()));
        return null;
    })->middleware('auth');
}
