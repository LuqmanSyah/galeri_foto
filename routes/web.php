<?php

use App\Http\Controllers\Admin\PagesController as AdminPagesController;
use App\Http\Controllers\User\PagesController as UserPagesController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applic       ation. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserPagesController::class, 'home'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');
Route::get('/logout', function () {
    Auth::logout();

    return redirect()->route('login.index');
})->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'processRegister'])->name('register.process');

Route::get('/profile', [UserPagesController::class, 'profile'])->name('profile');
Route::post('/profile/{id}', [UserProfileController::class, 'update'])->name('profile.update');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminPagesController::class, 'index'])->name('index');
});
