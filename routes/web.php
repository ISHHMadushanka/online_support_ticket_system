<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('new-ticket', [App\Http\Controllers\TicketsController::class, 'create']);
Route::post('new-ticket', [App\Http\Controllers\TicketsController::class, 'store']);
Route::get('my_tickets', [App\Http\Controllers\TicketsController::class, 'userTickets']);
Route::get('tickets/{ticket_id}', [App\Http\Controllers\TicketsController::class, 'show']);
Route::post('comment', [App\Http\Controllers\HomeController::class, 'postComment']);
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::get('tickets', [App\Http\Controllers\HomeController::class, 'index']);
    Route::post('close_ticket/{ticket_id}', [App\Http\Controllers\TicketsController::class, 'close']);
});
