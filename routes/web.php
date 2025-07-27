<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\GstBillController;
use App\Http\Controllers\PartyController;
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

// The welcome page is now the login page for guests
Route::get('/', function () {
    return view('auth.login');
});

// All application routes are now inside this group, requiring authentication.
Route::middleware(['auth', 'verified'])->group(function () {
    // Corrected dashboard route to point to your AppController
    Route::get('/dashboard', [AppController::class, 'index'])->name('dashboard');

    // Profile routes from Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // == YOUR ORIGINAL ROUTES HAVE BEEN ADDED BACK HERE ==

    // Party routes
    Route::get('/manage-parties', [PartyController::class, 'index'])->name('manage-parties');
    Route::get('/add-party', [PartyController::class, 'addParty'])->name('add-party');
    Route::post('/create-party', [PartyController::class, 'createParty'])->name('create-party');
    Route::get('/edit-party/{id}', [PartyController::class, 'editParty'])->name('edit-party');
    Route::put('/update-party/{id}', [PartyController::class, 'updateParty'])->name('update-party');
    Route::delete('/delete-party/{party}', [PartyController::class, 'deleteParty'])->name('delete-party');

    // Gst bill routes
    Route::get('/add-gst-bill', [GstBillController::class, 'addGstBill'])->name('add-gst-bill');
    Route::get('/manage-gst-bills', [GstBillController::class, 'index'])->name('manage-gst-bills');
    Route::get('/print-gst-bill/{id}/{currency?}', [GstBillController::class, 'print'])->name('print-gst-bill');
    Route::post('/create-gst-bill', [GstBillController::class, 'createGstBill'])->name('create-gst-bill');
    Route::delete('/delete-gst-bill/{id}', [GstBillController::class, 'destroy'])->name('delete-gst-bill');
});


// This file contains all the routes for login, registration, password reset, etc.
require __DIR__.'/auth.php';
