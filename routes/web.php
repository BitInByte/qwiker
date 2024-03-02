<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QwikerAuthorController;
use App\Http\Controllers\QwikerController;
use App\Models\Qwiker;
use App\Models\User;
use App\Models\UserFollower;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        Route::resource('/', QwikerController::class);
    });
});
// Route::get('/', function() {
//     return Inertia::render('Qwirk', [
//         'qwikers' => Qwiker::latest()->with('author')->get()
//     ]);
// });
Route::get('/author/{author_username}', [QwikerAuthorController::class, 'index'])->middleware('auth');
// Route::get('/author/{author_username}', function (string $author_username) {
//     $author = User::firstWhere('username', $author_username);
//     if (is_null($author)) {
//         // throw new Exception('User not found!', HTTP);
//         throw new NotFoundHttpException('User not found!');
//     }
//
//     // ddd($author);
//     return Inertia::render('QwikerAuthor', [
//         'qwikers' => Qwiker::latest()->where(
//             'user_id', $author->id
//         )->with('author')->get(),
//         'author_id' => $author->id,
//         'totalQwikes' => Qwiker::where(
//             'user_id', $author->id
//         )->count(),
//         'author_name' => $author->name,
//         'totalFollowers' => UserFollower::where(
//             'user_id', $author->id
//         )->count(),
//         'totalFollowing' => UserFollower::where(
//             'follower_id', $author->id
//         )->count(),
//         'isConnected' => UserFollower::where(
//             'follower_id', $author->id,
//         )->where(
//             'user_id', request()->user()->id,
//         )->count() > 0,
//     ]);
// });
Route::get('/author', [QwikerAuthorController::class, 'index'])->middleware('auth');
// Route::get('/author', function () {
//     return Inertia::render('QwikerAuthor', [
//         'qwikers' => Qwiker::latest()->where(
//             'user_id', request()->user()->id
//         )->with('author')->get(),
//         'author_id' => request()->user()->id,
//         'totalQwikes' => Qwiker::where(
//             'user_id', request()->user()->id
//         )->count(),
//         'totalFollowers' => UserFollower::where(
//             'user_id', request()->user()->id
//         )->count(),
//         'totalFollowing' => UserFollower::where(
//             'follower_id', request()->user()->id
//         )->count(),
//     ]);
// })->middleware('auth');
// Change this to the auth.php file
Route::get('/auth', function () {
    return Inertia::render('Auth/Auth');
})->name('auth');
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
