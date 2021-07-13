<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NavbarController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'toHome']);
Route::get('login', [LoginController::class, 'store']);
Route::get('shop', [NavbarController::class, 'showShop'])->name("user.shop");
Route::get('inventory', [NavbarController::class, 'showInventory'])->name("user.inventory");
Route::get('history', [NavbarController::class, 'showHistory'])->name("user.history");
Route::get('achievement', [NavbarController::class, 'showAchievement'])->name("user.achievement");
