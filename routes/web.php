<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('accounts', [AccountController::class, 'index'])->name('account.index');
Route::get('accounts/create', [AccountController::class, 'create'])->name('account.create');
Route::post('accounts/create', [AccountController::class, 'store'])->name('account.store');
Route::get('account/{account}', [AccountController::class, 'show'])->name('account.show');
Route::get('account/edit/{account}', [AccountController::class, 'edit'])->name('account.edit');
Route::put('account/edit/{account}', [AccountController::class, 'update'])->name('account.update');
Route::delete('account/{account}', [AccountController::class, 'destroy'])->name('account.destroy');
