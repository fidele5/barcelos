<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DeliveredController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get("/articles", [HomeController::class, "articles"])->name("articles");
Route::get('article/{id}', [ArticleController::class, "show"]);

Route::middleware(['auth'])->group(function () {
    Route::resource('cart', CartController::class);
    Route::get("/checkout", [HomeController::class, "checkout"])->name("checkout");
    Route::resource('paiement', PaiementController::class);
    Route::post("/paiement/authorize", [PaiementController::class, "authorized"]);
    //Route::get("/paiement/authorize", [PaiementController::class, "authorized"]);
});

Route::middleware("auth")->prefix("admin")->group(function () {
    Route::get('/', [HomeController::class, "admin"])->name("admin");
    Route::resource('article', ArticleController::class);
    Route::resource('categorie', CategorieController::class);
    Route::resource('commande', CommandeController::class);
    Route::resource('location', LocationController::class);
    Route::resource('message', MessageController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('user', UserController::class);
    Route::resource('client', ClientController::class);
    Route::resource('delivery', DeliveryController::class);
    Route::get('permissions', [RoleController::class, "permission"])->name("permissions");
    Route::get('delivered/{id}', [DeliveredController::class, "delivered"])->name("delivered");
    Route::delete('delivered/{delivered}/destroy', [DeliveredController::class, "destroy"])->name("delivered.destroy");
    Route::get('delivereds/{id}', [DeliveredController::class, "delivereds"])->name("delivereds");
    Route::post("permission/save", [RoleController::class, "savePermission"])->name("savePermission");
});
