<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;
use App\Models\Filiere;

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



Route::get('/', function() {
  $filiere = Filiere::all();
  return view('filiere.index', compact('filiere'));
})->name('home');

Route::resource('/{filiere}/stagiaires', StagiaireController::class);

Route::redirect('/{filiere}', '/{filiere}/stagiaires');