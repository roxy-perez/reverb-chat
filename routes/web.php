<?php

use App\Models\User;
use App\Events\NewPromotion;
use App\Events\YouAreTheWinner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new-promotion', function () {
    NewPromotion::dispatch('New Promotion', 'Check out our new promotion!');
});

Route::get('/you-are-the-winner/{id}', function (int $id) {
    $user = User::findOrFail($id);
    YouAreTheWinner::dispatch($user, "Hi, {$user->name}! You are the winner!");
});
