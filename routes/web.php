<?php
// routes/web.php

use App\Http\Controllers\AppController;
use App\Http\Controllers\VatInvoiceController; // <-- Renamed Controller
use App\Http\Controllers\PartyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AppController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Party routes
    Route::get('/manage-parties', [PartyController::class, 'index'])->name('manage-parties');
    Route::get('/add-party', [PartyController::class, 'addParty'])->name('add-party');
    Route::post('/create-party', [PartyController::class, 'createParty'])->name('create-party');
    Route::get('/edit-party/{id}', [PartyController::class, 'editParty'])->name('edit-party');
    Route::put('/update-party/{id}', [PartyController::class, 'updateParty'])->name('update-party');
    Route::delete('/delete-party/{party}', [PartyController::class, 'deleteParty'])->name('delete-party');

    // VAT Invoice routes (previously GST Bill)
    Route::get('/add-vat-invoice', [VatInvoiceController::class, 'addVatInvoice'])->name('add-vat-invoice');
    Route::get('/manage-vat-invoices', [VatInvoiceController::class, 'index'])->name('manage-vat-invoices');
    Route::get('/print-vat-invoice/{id}', [VatInvoiceController::class, 'print'])->name('print-vat-invoice');
    Route::post('/create-vat-invoice', [VatInvoiceController::class, 'createVatInvoice'])->name('create-vat-invoice');
    Route::delete('/delete-vat-invoice/{id}', [VatInvoiceController::class, 'destroy'])->name('delete-vat-invoice');
});

require __DIR__.'/auth.php';
