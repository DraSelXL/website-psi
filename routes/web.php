<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UseItemController;
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
Route::get('logout', [NavbarController::class, 'logout']);
Route::get('shop', [NavbarController::class, 'showShop'])->name("user.shop");
Route::get('home', [NavbarController::class, 'showHome'])->name("user.home");
Route::get('leaderboard', [NavbarController::class, 'showLeaderboard'])->name("user.leaderboard");
Route::get('inventory', [NavbarController::class, 'showInventory'])->name("user.inventory");
Route::get('history', [NavbarController::class, 'showHistory'])->name("user.history");
Route::get('achievement', [NavbarController::class, 'showAchievement'])->name("user.achievement");
Route::get('stats', [NavbarController::class, 'showStats'])->name("user.stats");
Route::get('admin/postGame', [NavbarController::class, 'adminShowPostGameInput'])->name("admin.postGameInput");
Route::get('admin/leaderboard', [NavbarController::class, 'adminShowLeaderboard'])->name("admin.leaderboard");
Route::get('admin/teamStats', [NavbarController::class, 'adminShowTeamStats'])->name("admin.teamStats");
Route::get('admin/teamHistory', [NavbarController::class, 'adminShowTeamHistory'])->name("admin.teamHistory");
Route::get('admin/misc', [NavbarController::class, 'adminShowMisc'])->name("admin.misc");

Route::post('updateGoldAndPoints', [NavbarController::class, 'updateGAP']);

Route::post('shop/materialDetail', [ShopController::class, 'showMaterialDetailModal']);
Route::post('shop/itemDetail', [ShopController::class, 'showItemDetailModal']);
Route::post('shop/buyGoods', [ShopController::class, 'purchaseGoods']);

Route::post('achievement-crafting', [AchievementController::class, 'craftAchievement']);
Route::post('achievement-crafting/search', [AchievementController::class, 'search']);

Route::post('admin/postGameInputForm', [AdminController::class, 'showPostGameForm']);
Route::post('admin/saveMisc', [AdminController::class, 'updateMisc']);
Route::post('submitPostGame', [AdminController::class, 'submitPostGame']);

Route::post('useItem/use', [UseItemController::class, 'useItem']);
Route::post('useItem/activeItems', [UseItemController::class, 'activeItemsCheck']);
Route::post('useItem/gameState', [UseItemController::class, 'gameStateCheck']);
Route::post('useItem/useMissingSubstitute', [UseItemController::class, 'useMissingSubstitute']);
Route::post('useItem/subsMaterial', [UseItemController::class, 'subsMaterial']);

Route::post('leaderboard/loadLeaderboard', [LeaderboardController::class, 'loadLeaderboard']);
