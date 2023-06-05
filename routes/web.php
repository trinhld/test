<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name(DASHBOARD);

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name(PROFILE_INDEX);
        Route::get('/edit', [ProfileController::class, 'edit'])->name(PROFILE_EDIT);
        Route::patch('/', [ProfileController::class, 'update'])->name(PROFILE_UPDATE);
        Route::post('/user/store', [ProfileController::class, 'storeUserInformation'])->name(USER_PROFILE_STORE);
        Route::post('/admin/store', [ProfileController::class, 'storeAdminInformation'])->name(ADMIN_PROFILE_STORE);
        Route::post('/user/update', [ProfileController::class, 'updateUserInformation'])->name(USER_PROFILE_UPDATE);
        Route::post('/admin/update', [ProfileController::class, 'updateAdminInformation'])->name(ADMIN_PROFILE_UPDATE);
        Route::delete('/', [ProfileController::class, 'destroy'])->name(PROFILE_DESTROY);

        Route::get('/verify-email', [UserController::class, 'editEmail'])->name(USER_EDIT_EMAIL);
        Route::get('/verify-email/{email}', [UserController::class, 'confirmOtp'])->name(USER_CONFIRM_OTP);
        Route::patch('/verify-email/update', [UserController::class, 'updateEmail'])->name(USER_UPDATE_EMAIL);
        Route::post('/verify-email', [UserController::class, 'storeOtp'])->name(USER_STORE_OTP);

    });

    // user update email
    Route::prefix('contact')->group(function () {
        Route::get('/create', [ContactController::class, 'create'])->name(USER_CONTACT_CREATE);
        Route::get('/complete', [ContactController::class, 'complete'])->name(USER_CONTACT_COMPLETE);
    });
});

require __DIR__.'/auth.php';
