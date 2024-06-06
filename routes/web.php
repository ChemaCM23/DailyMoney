<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ContactController;

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

/* Mis páginas */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/movement', function () {
    return view('movement');
})->middleware(['auth', 'verified'])->name('movement');

Route::get('/history', function () {
    return view('history');
})->middleware(['auth', 'verified'])->name('history');

Route::get('/aboutUs', function () {
    return view('aboutUs');
})->middleware(['auth', 'verified'])->name('aboutUs');

Route::get('/utilities', function () {
    return view('utilities');
})->middleware(['auth', 'verified'])->name('utilities');

Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth', 'verified'])->name('contact');


/* Rutas de autenticación */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Añadir saldo inicial
    Route::post('/update-balance', [BalanceController::class, 'update'])->name('update.balance');

    // Editar saldo
    Route::post('/edit-balance', [BalanceController::class, 'edit'])->name('edit.balance');

    // Añadir movimiento
    Route::post('/movements', [MovementController::class, 'store'])->name('movements.store');

    // Crear contacto
    Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    //Contacto2
    Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
    Route::post('/contact/send', [ContactController::class, 'sendEmail'])->name('contact.send');
});

require __DIR__ . '/auth.php';
