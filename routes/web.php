<?php

use App\Http\Controllers\LearningCenterController;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SystemManageController;
use App\Http\Controllers\UserController;
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
})->middleware('guest');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function (){
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('/system-management', [SystemManageController::class, 'index'])->name('system.index');

    Route::controller(NgoController::class)->group(function(){
        Route::get('/ngo', 'index')->name('ngo.index');
        Route::get('/ngo/create', 'create')->name('ngo.create');
        Route::post('/ngo/create', 'store')->name('ngo.store');
    });

    Route::controller(StaffController::class)->group(function(){
        Route::get('/staff', 'index')->name('staff.index');
        Route::get('/staff/create', 'create')->name('staff.create');
    });

    Route::controller(LearningCenterController::class)->group(function(){
        Route::get('/learning-center', 'index')->name('learningCenter.index');
    });
    
    Route::controller(UserController::class)->group(function(){
        Route::get('/user', 'index')->name('user.index');
        Route::post('/user', 'store')->name('user.store');
        Route::get('/user/create', 'create')->name('user.create');
        Route::get('/user/show', 'show')->name('user.show');
        Route::get('/user/edit/{id}', 'edit')->name('user.edit');
        Route::put('/user/update/{id}', 'update')->name('user.update');
    });
    
});

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function(){
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
