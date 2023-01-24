<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\DashboardComicController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [ComicController::class, 'index']);

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Helga Juan Muharna",
        "email" => "helga.juan@gmail.com"
    ]);
});

Route::get('/posts', [ComicController::class, 'index']);

// Route single Post
Route::get('/posts/{comic:slug}', [ComicController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Category',
        "active" => 'category',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);



Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');


Route::get('/dashboard/comics/checkSlug', [DashboardComicController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/comics', DashboardComicController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('auth');



