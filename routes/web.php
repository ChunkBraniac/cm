<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // custom routes
    Route::get('addcontact', [ContactsController::class, 'addContactPage']);
    Route::post('addcontact', [ContactsController::class, 'addContact'])->name('contact.add');
    Route::get('mycontacts', [ContactsController::class, 'myContacts'])->name('view.contacts');
    Route::delete('delete/{id}', [ContactsController::class, 'destroy'])->name('contact.destroy');
    Route::get('editcontact/{id}', [ContactsController::class, 'edit'])->name('contact.edit');
    Route::post('update/{id}', [ContactsController::class, 'update'])->name('contact.update');
    Route::get('search', [ContactsController::class, 'search'])->name('contacts.search');
    // end of custom routes

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
