<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/components/tabs', [PagesController::class, 'tabs'])->name('components.tabs');
Route::get('/components/accordion', [PagesController::class, 'accordion'])->name('components.accordion');
