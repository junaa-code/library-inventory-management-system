<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\TransactionController;

Route::get('/', function(){ return redirect()->route('books.index'); });

Route::resource('books', BookController::class);
Route::resource('borrowers', BorrowerController::class);
Route::resource('transactions', TransactionController::class);
Route::post('transactions/{transaction}/return', [TransactionController::class,'returnBook'])->name('transactions.return');


