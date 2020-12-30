<?php

use App\Http\Livewire\Contact;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Logout;
use App\Http\Livewire\Register;
use App\Http\Livewire\Services\Home as ServiceHome;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home/{name?}', Home::class);
Route::get('/services/home', ServiceHome::class);
Route::get('/contact', Contact::class);
Route::get('/users', Users::class);
Route::group(['middleware' => ['web','guest']], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});
// Auth::routes();
Route::group(['middleware' => ['web','auth']], function () {
    Route::get('/logout', Logout::class)->name('logout');
    Route::get('/home', Home::class)->middleware('auth')->name('home');
});
