<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DashboardArticlesController;

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

Route::get('/', function () {
    return view('auth.login', [
        "title" => "Post"
    ]);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function(){
    Route::get('/articles/{articles}', [ArticlesController::class, 'show']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/category/{category}', [CategoryController::class, 'show']);
    Route::get('/author', [AuthorController::class, 'index']);
    Route::get('/author/{user}', [AuthorController::class, 'show']);
    // Route::get('/dashboard', function(){
    //     return view('dashboard.index');
    // });
    Route::resource('/dashboard/articles', DashboardArticlesController::class);
});
