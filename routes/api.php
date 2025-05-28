<?php
// routes/api.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('api')->group(function () {
    // Users Routes
    Route::apiResource('users', UserController::class, [
        'parameters' => ['users' => 'user_id']
    ]);

    // Authors Routes
    Route::apiResource('authors', AuthorController::class, [
        'parameters' => ['authors' => 'author_id']
    ]);

    // Books Routes
    Route::apiResource('books', BookController::class, [
        'parameters' => ['books' => 'book_id']
    ]);

    // Loans Routes
    Route::apiResource('loans', LoanController::class, [
        'parameters' => ['loans' => 'loan_id']
    ]);
    
    // Return Book Route
    Route::patch('loans/{loan_id}/return', [LoanController::class, 'returnBook']);
});