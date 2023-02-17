<?php

use App\Enums\UserRole;
use App\Events\publicEvent;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

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
// View profile

Route::middleware(['auth', CheckRole::class . ':' . 'manager'])->group(function () {
    Route::get('/profile', [UserController::class, 'viewProfile'])->middleware('auth');
    Route::get('/companyProfile', [CompanyController::class, 'viewCompanyProfile']);
});

Route::middleware(['auth', CheckRole::class . ':' . 'admin'])->group(function () {
    Route::get('/CreateCompany', [CompanyController::class, 'viewCreateCompany']);
    Route::get('/CreateAccount', [UserController::class, 'viewCreateAccount']);
    Route::get('/editActiveCompany', [CompanyController::class, 'viewActiveCompany']);
});

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

// edit Profile
Route::put('/editProfile', [UserController::class, 'editProfile'])->middleware('auth');

// Create account
Route::post('/createAccount', [UserController::class, 'createAccount'])->middleware('auth');

// Update Company
Route::put('/updateCompany', [CompanyController::class, 'updateCompany'])->middleware('auth');

// Create Company
Route::post('/createCompany', [CompanyController::class, 'createCompany'])->middleware('auth');

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
