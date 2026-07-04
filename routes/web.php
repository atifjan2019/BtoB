<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/',         [PageController::class, 'home'])->name('home');
Route::get('/menu',     [PageController::class, 'menu'])->name('menu');
Route::get('/about',    [PageController::class, 'about'])->name('about');
Route::get('/gallery',  [PageController::class, 'gallery'])->name('gallery');
Route::get('/events',   [PageController::class, 'events'])->name('events');
Route::get('/reserve',  [PageController::class, 'reserve'])->name('reserve');
Route::get('/contact',  [PageController::class, 'contact'])->name('contact');
