<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

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
    return view('start');
})->name('index');

Auth::routes();

Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kokbok/skapa', [Controllers\RecipieController::class, 'createRecipie'])
    ->name('create-recipie')
    ->middleware('auth');

Route::get('/kokbok/{username}/{recipie_id}', [Controllers\RecipieController::class, 'showRecipie'])->name('recipie');

Route::name('upload.')->prefix('/upload')->group(function() {
    Route::post('/profile-pic', [Controllers\UserController::class, 'uploadProfileImage'])->name('profile-image');
    Route::post('/kokbok/skapa', [Controllers\RecipieController::class, 'uploadRecipie'])->name('recipie');
});
