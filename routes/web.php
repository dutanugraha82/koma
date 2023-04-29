<?php

use App\Http\Controllers\Admin\DirectoryController;
use App\Http\Controllers\LoginController;
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




Route::get('/{any?}', function () {
    return view('app');
});

Route::prefix('admin')->group(function (){
    Route::get('/login',[LoginController::class,'index'])->middleware('guest');
    Route::post('/authenticate',[LoginController::class,'authenticate'])->middleware('guest');
    Route::post('/logout',[LoginController::class,'logout']);

        Route::middleware(['auth', 'revalidate'])->group(function () {
            Route::get('/dashboard', function () {
                return view('admin.contents.dashboard');
            });
            Route::get('/directory/json',[DirectoryController::class,'json'])->name('directory.json');
            Route::resource('directory',DirectoryController::class);

            Route::get('/feature', function () {
                return view('admin.contents.feature.index');
            });
            Route::get('/highlight', function () {
                return view('admin.contents.highlight.index');
            });
            Route::get('/showcase', function () {
                return view('admin.contents.showcase.index');
            });
            Route::get('/insight', function () {
                return view('admin.contents.insight.index');
            });
    });
});

