<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [PageController::class,'about']);

Route::get('/resume', [PageController::class,'resume']);

Route::get('/portfolio', [PageController::class,'portfolio']);

Route::get('/services', [PageController::class,'services']);

Route::get('/contact', [PageController::class,'contact']);

Route::get('/blogs', [PageController::class,'blogs']);

Route::get('/blogs/{id}/detail', [PageController::class,'detailblogs']);

// AUTH
Route::get("/login", [AuthController::class, "login"])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:web')->group(function () {
    Route::get('/dashboard', [PageController::class,'dashboard']);

    Route::get('/blog', [BlogController::class,'index']);

    Route::get('/blog/add', [BlogController::class,'create']);

    Route::post('/blog', [BlogController::class,'store']);

    Route::get('/blog/{id}/delete', [BlogController::class,'destroy']);

    Route::get('/blog/{id}/edit', [BlogController::class,'show']);

    Route::put('/blog/{id}', [BlogController::class, 'update']);
});