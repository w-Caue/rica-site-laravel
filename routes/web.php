<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');


Route::middleware('auth')->prefix('rica')->name('rica.')->group(function () {

    Route::get('/dashboard', Dashboard::class)
        ->name('dashboard');
});
