<?php

use App\Http\Controllers\AccueilController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JeuController;
use App\Http\Controllers\TriController;


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
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->get('/dashboard', [HomeController::class, 'cinqAleatoires'])->name('dashboard');

//Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/jeux/show/{id}', [JeuController::class, 'show'])->name('jeu_show');

Route::get('/jeux/rules/{id}', [JeuController::class, 'rules'])->name('jeu_rules');

Route::get('/jeux/create', [JeuController::class, 'create'])->name('jeu_create');

Route::post('/jeux/create', [JeuController::class, 'store'])->name('jeu_store')->middleware('auth');

Route::get('/jeux/{sort?}', [JeuController::class, 'index'])->name('jeu_index');

Route::get('/user/profile', function () {return view('jeu.profile');})->name('profile');

Route::post('/ajout', [JeuController::class, 'ajout']) -> name('ajout');

Route::post('/avis', [JeuController::class, 'avis']) -> name('avis');

Route::post('/tri', [TriController::class, 'triediteur'])->name('jeu_triediteur');

Route::post('/jeux/avis', [JeuController::class, 'avis'])->name('avis');
Route::post('/tritheme', [TriController::class, 'tritheme'])->name('jeu_tritheme');

Route::post('/trimecanique', [TriController::class, 'trimecanique'])->name('jeu_trimecanique');

Route::post('/recherche}', [JeuController::class, 'recherche'])->name('jeu_recherche');

Route::get('/dashboard/meilleur', [HomeController::class, 'meilleur'])->name('accueil_meilleur');

Route::get('/enonce', function () {
    return view('enonce.index');
});
