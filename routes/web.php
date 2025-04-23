<?php
use \App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;

use Illuminate\Support\Facades\Route;


//La page racine
Route::get('/', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'traitementLogin'])->name('traitementLogin');


//route sécurisé

Route::middleware('auth')->group(function () {

    Route::get('/page_d_accueil',[AppController::class,'index'])->name('page_d_accueil');



    //toutes les routes à l’intérieur commenceront par /employers

    Route::prefix('employers')->group(function () {
        Route::get('/', [EmployerController::class,'liste_des_employer'])->name('employer.liste_des_employer');
        Route::get('/ajouter', [EmployerController::class,'ajouter'])->name('employer.ajouter');
        Route::get('/modifier/{employer}', [EmployerController::class,'modifier'])->name('employer.modifier');
    });



    //Toutes les routes à l'intérieur commencerons par /departements

    Route::prefix('departements')->group(function () {
        Route::get('/', [DepartementController::class,'liste_des_departements'])->name('departement.liste_des_departements');

        //Ajout d'un département
        Route::get('/ajouter', [DepartementController::class,'ajouter'])->name('departement.ajouter');
        Route::post('/ajouter', [DepartementController::class,'ajouterTraitement'])->name('departement.ajouterTraitement');

        //mise à jour d'un département
        Route::get('/modifier/{departement}', [DepartementController::class,'modifier'])->name('departement.modifier');
        Route::put('/modifier/{departement}', [DepartementController::class,'modifierTraitement'])->name('departement.modifierTraitement');

        //Suppression d'un département
        Route::get('/{departement}', [DepartementController::class,'supprimer'])->name('departement.supprimer');

    });
});

