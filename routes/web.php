<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [ PageController::class, 'home' ]);
Route::get('/page/{slug}', [ PageController::class, 'page' ]);
Route::get('/customers', [ PageController::class, 'customers' ]);
Route::get('/category/{slug}', [ PageController::class, 'category' ])->name('category.show');
Route::get('/customer/{slug}', [ PageController::class, 'customer' ])->name('post.show');