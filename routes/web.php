<?php

use App\Http\Controllers\HashtagController;
use App\Http\Controllers\QwikerAuthorController;
use App\Http\Controllers\QwikerController;
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

Route::middleware('auth')->group(function () {
    Route::name('qwiker.')->group(function () {
        // Route::resource('/', QwikerController::class, ['as' => 'qwiker']);
        Route::resource('/', QwikerController::class)->only(['index', 'store']);
    });
    Route::get('/author/{author_username}', [QwikerAuthorController::class, 'index']);
    Route::post('/author/{author_username}', [QwikerAuthorController::class, 'connect']);
    // Route::get('/author', [QwikerAuthorController::class, 'index'])->middleware('auth');
    Route::get('/author', [QwikerAuthorController::class, 'index']);
    Route::get('/hashtag/{hashtag}', [HashtagController::class, 'index']);
});

require __DIR__.'/auth.php';
