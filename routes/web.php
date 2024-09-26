<?php
use App\Http\Controllers\ClientController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::post('/store', [ClientController::class, 'store']);

Route::get('/client', function () {
    return view('create_client');
});


Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
