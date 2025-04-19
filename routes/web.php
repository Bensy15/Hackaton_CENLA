<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\VolunteerAuthController;
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
Route::get('/posts', function () {
    $helpposts = [
        ["name_user" => "Аля","Heading" => "убраться дома", "importance" => true,"txt" => "Помогите убраться", "id" => "1"],
        ["name_user" => "Алиса","Heading" => "убраться в парке", "importance" => false ,"txt" => "Помогите убрать листья и мусор", "id" => "2"],
    ];

    return view('post.index', ["greeting" => "привет", "helpposts" => $helpposts]);
})->name('post.index');   

Route::get('posts/{id}', function ($id) {

    return view('post.show', ["id" => $id]);
});

// Route::get('/post/create', function () {
//     return view('home');
// });


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