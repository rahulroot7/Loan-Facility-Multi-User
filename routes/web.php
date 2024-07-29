<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;

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

// Route::get('/', function () {
//     return view('auth.login');
// })->middleware('guest');

Auth::routes();
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('login', [LoginController::class, 'login'])->name('loginUser');
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forgetPassword');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{user}', [UserController::class, 'update'])->name('update');
        Route::get('/view/{user}', [UserController::class, 'view'])->name('view');
        Route::post('/users/update-status', [UserController::class, 'updateStatus'])->name('updateStatus');
        Route::get('excel-upload', [UserController::class, 'excelUpload'])->name('excelUpload');
        Route::post('users-import', [UserController::class, 'import'])->name('import');
        Route::get('/delete/{user}', [UserController::class, 'delete'])->name('delete');
    });
});
