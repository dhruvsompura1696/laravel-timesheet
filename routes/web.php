<?php

use Illuminate\Support\Facades\Route;
use App\Mail\resetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/reset-password',[HomeController::class,'reset_password_view']);
Route::post('/reset-password',[HomeController::class,'reset_password_submit']);
Route::post('/forgot-password',function(Request $r){
    $r->validate([
        'email' => 'required',
        'password' => 'required|confirmed|min:8',
    ]);

    $user = User::where(['email'=>$r->email])->update([
        'password' => Hash::make($r->password)
    ]);
    return back()->with("status", "Password changed successfully!");
});

Route::get('/users',[UserController::class,'display_users']);
Route::get('/add_user',[UserController::class,'add_user_view'])->middleware('rolesecurity');
Route::post('/create_user',[UserController::class,'create_user'])->middleware('rolesecurity');
Route::post('/update_user',[UserController::class,'update_user']);
Route::get('/users/delete/{delete_user_id}',[UserController::class,'delete_user'])->middleware('rolesecurity');;
Route::get('/users/edit/{edit_user_id}',[UserController::class,'edit_user_view']);