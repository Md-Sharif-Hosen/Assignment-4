<?php

use App\Http\Controllers\ContactController;
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

//contract
/*   Route::resource('contact', ContactController::class); */
Route::get('/contacts',[ContactController::class,"index"])->name('contacts');
Route::get('/contacts/create',[ContactController::class,'create'])->name('contacts.create');
Route::post('/contacts/store',[ContactController::class,'store'])->name('contacts.store');
Route::get('/contacts/show/{id}', [ContactController::class, 'show'])->name('contacts.show');
Route::get('/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/update', [ContactController::class, 'update'])->name('contacts.update');
Route::get('/contacts/destroy/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

