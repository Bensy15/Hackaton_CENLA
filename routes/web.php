<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\VolunteerAuthController;
use App\Http\Controllers\HelpPostController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\Volunteer\HomeController as VolunteerHomeController;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\returnSelf;

// Общий маршрут для перенаправления после входа
Route::get('/', function () {
    if (Auth::guard('user')->check()) {
        return redirect()->route('user.home');
    } elseif (Auth::guard('volunteer')->check()) {
        return redirect()->route('volunteer.home');
    }
    return view('home');
})->name('home');

// User Routes
Route::prefix('user')->group(function () {
Route::get('/home', [UserHomeController::class, 'index'])->name('user.home');

// Post
Route::get('/posts', [HelpPostController::class, 'index'])->name('post.index');   
Route::get('/posts/create', [HelpPostController::class, 'create'] )->name('post.create');
Route::get('posts/{id}', [HelpPostController::class, 'show'])->name('post.show');
Route::post('/posts', [HelpPostController::class, 'store'])->name('post.store');

    // Регистрация
    Route::get('/register', [UserAuthController::class, 'showRegistrationForm'])->name('user.register');
    Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.submit');
});

// Volunteer Routes
Route::prefix('volunteer')->group(function () {
    Route::get('/home', [VolunteerHomeController::class, 'index'])->name('volunteer.home');
    
    // Регистрация
    Route::get('/register', [VolunteerAuthController::class, 'showRegistrationForm'])->name('volunteer.register');
    Route::post('/register', [VolunteerAuthController::class, 'register'])->name('volunteer.register.submit');
});

// Общие маршруты аутентификации
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

