<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () { return view('welcome'); })->name('index');
Route::get('/about-us', function () { return view('about'); })->name('about');

Route::get('/posts', 'App\Http\Controllers\BlogPostController@index')->name('posts.index');
Route::get('/posts/{id}', [BlogPostController::class, 'show'])->name('posts.show');
Route::post('/posts', [BlogPostController::class, 'store']);
Route::delete('/posts/{id}', [BlogPostController::class, 'destroy'])->name('posts.destroy');
Route::put('/posts/{id}', [BlogPostController::class, 'update'])->name('posts.update');

Route::post('/posts/{id}/comments', [BlogPostController::class, 'storePostComment'])->name('posts.comments.store');


Route::get('/db', function () {
    var_dump(DB::connection()->getPdo());
    return view('welcome');
})->name('testdb');

use App\Models\BlogPost;
Route::get('/bp', function () {
    return BlogPost::where('title', 'Title 1')->latest()->first();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
