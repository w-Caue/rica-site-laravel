<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Contas\ContasList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Perfil;
use App\Livewire\Ticket;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::get('/logout', function () {
    auth()->guard()->logout(false);
    // session()->flush();
    return redirect()->route('welcome');
})->name('logout');

Route::middleware('auth')->prefix('rica')->name('rica.')->group(function () {

    Route::get('/dashboard', Dashboard::class)
        ->name('dashboard');

    Route::get('/perfil', Perfil::class)
        ->name('perfil');

    Route::get('/ticket', Ticket::class)
        ->name('ticket');

    Route::get('/contas', ContasList::class)
        ->name('contas');
});
