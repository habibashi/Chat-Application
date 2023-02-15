<?php

use App\Events\publicEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/profile', function () {
    return view('users.profile');
});

// show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// People Chat
Route::get('/people', function () {
    return view('chat.people');
});

// Group Chat
Route::get('/groups', [ChatController::class, 'groups']);

// Chat page
Route::get('/chat', function () {
    return view('chat.chatPage');
});

// edit Profile
Route::put('/editProfile', [UserController::class, 'editProfile']);


// New account page
Route::get('/CreateAccount', function() {
    return view('admin.createAccount');
});

// Create account
Route::post('/createAccount', [UserController::class, 'createAccount']);

// New company
Route::get('/CreateCompany', function() {
    return view('admin.createCompany');
});

Route::post('/createCompany', [CompanyController::class, 'createCompany']);

if (App::environment('local')) {
    // Route::get('/playground', function() {
    //     event(new publicEvent());
    //     return null;
    // });

    Route::get('/chat', function() {
        return view('chat/chatPage');
    });

    Route::post('/chat-message', function(Request $request) {
        event(new publicEvent($request->message));
        return null;
    });
}
