<?php


use App\Models\Articel;
use GuzzleHttp\Middleware;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\depan\HomeController;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\back\ArticelController;
use App\Http\Controllers\depan\ContactController;
use App\Http\Middleware\UserAccessMiddleware;
use App\Http\Controllers\Auth\UserAutentikasi;
use App\Http\Controllers\depan\DepanCotroller;
use App\Http\Controllers\depan\ArticelPostController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\back\ConfigController;
use App\Http\Controllers\back\DashboardController;
use App\Http\Controllers\depan\CategoryArticelController;

Route::middleware(['guest'])->group(function () {
    Route::get('/about',[HomeController::class,'about'])->name('about');
    Route::get('/register', [UserAutentikasi::class, 'register'])->name('register.tampil');
    Route::post('/register', [UserAutentikasi::class, 'store'])->name('register');
    Route::get('/login', [UserAutentikasi::class, 'index'])->name('login');
    Route::post('/login', [UserAutentikasi::class, 'loginStore'])->name('login.data');
    Route::get('/', [DepanCotroller::class, 'index']);
    Route::get('/p/{slug}', [ArticelPostController::class, 'show']);
    Route::get('/view-articel', [ArticelPostController::class, 'view'])->name('view');
    Route::post('/articel/serach', [ArticelPostController::class, 'view'])->name('search');
    Route::get('/category-articel/{slug}',[CategoryArticelController::class, 'index'])->name('category.articel');
    Route::get('/contact',[ContactController::class,'index'])->name('contact');
    Route::post('/send-whatsapp-message', [ContactController::class,'sendWa'])->name('send.whatsapp.message');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/category', CategoryController::class)->middleware(UserAccessMiddleware::class);
    Route::resource('/articel', ArticelController::class);
    Route::group(['prefix' => 'laravel-filemanager'], function () {
    });
    Route::resource('/config', ConfigController::class);
    Route::get('/logout', [UserAutentikasi::class, 'logout'])->name('logout');
});
