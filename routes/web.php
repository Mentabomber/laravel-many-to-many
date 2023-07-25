<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Project\PrjController;
use App\Http\Controllers\Status\GuestController;
use App\Http\Controllers\Status\LoggedController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/create,' [LoggedController::class, 'create'])
// -> middleware(['auth'])
// -> name('project.create');
Route :: get('/create', [LoggedController :: class, 'create'])
    -> middleware(['auth'])
    -> name('project.create');
Route :: post('/store', [LoggedController :: class, 'store'])
    -> middleware(['auth'])
    -> name('project.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('index', [PrjController::class, 'index'] ) -> name('index');

Route::get('show{id}', [PrjController::class, 'show'] )->middleware(['auth'])->name('show');;


require __DIR__.'/auth.php';

