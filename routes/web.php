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
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [NavbarController::class, 'logout']);
Route::post('shop', [NavbarController::class, 'showShop'])->name("user.shop");
Route::post('home', [NavbarController::class, 'showHome'])->name("user.home");
Route::post('leaderboard', [NavbarController::class, 'showLeaderboard'])->name("user.leaderboard");
Route::post('inventory', [NavbarController::class, 'showInventory'])->name("user.inventory");
Route::post('history', [NavbarController::class, 'showHistory'])->name("user.history");
Route::post('achievement', [NavbarController::class, 'showAchievement'])->name("user.achievement");
Route::post('stats', [NavbarController::class, 'showStats'])->name("user.stats");
Route::post('admin/postGame', [NavbarController::class, 'adminShowPostGameInput'])->name("admin.postGameInput");
Route::post('admin/leaderboard', [NavbarController::class, 'adminShowLeaderboard'])->name("admin.leaderboard");
Route::post('admin/teamStats', [NavbarController::class, 'adminShowTeamStats'])->name("admin.teamStats");
Route::post('admin/teamHistory', [NavbarController::class, 'adminShowTeamHistory'])->name("admin.teamHistory");
Route::post('admin/misc', [NavbarController::class, 'adminShowMisc'])->name("admin.misc");
Route::post('admin/manualInput', [NavbarController::class, 'adminShowManualInput'])->name("admin.input");

Route::post('updateGoldAndPoints', [NavbarController::class, 'updateGAP']);

Route::post('shop/materialDetail', [ShopController::class, 'showMaterialDetailModal']);
Route::post('shop/itemDetail', [ShopController::class, 'showItemDetailModal']);
Route::post('shop/buyGoods', [ShopController::class, 'purchaseGoods']);

Route::post('achievement-crafting', [AchievementController::class, 'craftAchievement']);
Route::post('achievement-crafting/search', [AchievementController::class, 'search']);

Route::post('admin/postGameInputForm', [AdminController::class, 'showPostGameForm']);
Route::post('admin/saveMisc', [AdminController::class, 'updateMisc']);
Route::post('admin/finishGame', [AdminController::class, 'finishGame']);
Route::post('admin/manualInsert', [AdminController::class, 'giveToUser']);
Route::post('submitPostGame', [AdminController::class, 'submitPostGame']);

Route::post('useItem/use', [UseItemController::class, 'useItem']);
Route::post('useItem/activeItems', [UseItemController::class, 'activeItemsCheck']);
Route::post('useItem/gameState', [UseItemController::class, 'gameStateCheck']);
Route::post('useItem/useMissingSubstitute', [UseItemController::class, 'useMissingSubstitute']);
Route::post('useItem/subsMaterial', [UseItemController::class, 'subsMaterial']);

Route::post('leaderboard/loadLeaderboard', [LeaderboardController::class, 'loadLeaderboard']);
Route::post('leaderboard/checkFreezeState', [LeaderboardController::class, 'checkFreezeState']);
