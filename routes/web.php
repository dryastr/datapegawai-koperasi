<?php

use App\Http\Controllers\admin\AddUserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\JabatansController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role->name === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    return redirect()->route('login');
})->name('home');

Auth::routes(['register' => false]);

// Auth::routes(['middleware' => ['redirectIfAuthenticated']]);

Route::middleware(['auth', 'role.admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('admin/export-users', [AdminController::class, 'exportUsers'])->name('export.users');

        Route::resource('addusers', AddUserController::class);
        Route::resource('jabatans', JabatansController::class);
    });
});

Route::middleware(['auth', 'role.user'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('user.dashboard');
});
