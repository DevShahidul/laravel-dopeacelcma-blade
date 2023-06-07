<?php

use App\Http\Controllers\LearningCenterController;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SystemManageController;
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

    Route::get('/ngo', [NgoController::class, 'index'])->name('ngo.index');
    Route::get('/ngo/create', [NgoController::class, 'create'])->name('ngo.create');
    Route::post('/ngo/create', [NgoController::class, 'store'])->name('ngo.store');
    
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
    Route::get('/learning-center', [LearningCenterController::class, 'index'])->name('learningCenter.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
