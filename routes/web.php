<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BuysController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth' , 'checkUser']] , function (Router $router){
   $router->get('/admin' , [AdminController::class , 'index']);
   $router->resource('books' , BookController::class);
   $router->resource('users' , UserController::class);
   $router->resource('buys' , BuysController::class);
   $router->resource('tags' , TagController::class);
});
Route::get('/', function () {
    return view('index');
});
require __DIR__ . '/auth.php';


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');




