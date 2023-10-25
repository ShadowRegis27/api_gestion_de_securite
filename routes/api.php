<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\prioriteincidentController;
use App\Http\Controllers\Api\IncidentController;
use App\Http\Controllers\Api\pIncident;
use App\Http\Controllers\Api\RoleUtilisateurController;
use App\Http\Controllers\Api\StatutIncidentController;
use App\Http\Controllers\Api\UtilisateurController;

//Definition des routes pour l'API prioriteincident

// Definition des routes pour l'API Role Utilisateur
Route::get('/roleutilisateur/index',[RoleUtilisateurController::class,"index"]);
Route::get('/roleutilisateur/show/{id}',[RoleUtilisateurController::class,"show"]);
Route::post('/roleutilisateur/store', [RoleUtilisateurController::class,"store"]);
Route::put('/roleutilisateur/update/{id}',[RoleUtilisateurController::class,"update"]);
Route::delete('/roleutilisateur/delete/{id}',[RoleUtilisateurController::class,"destroy"]);

//Definition des routes pour l'API  Utilisateur

Route::get('/utilisateur/show/{id}',[UtilisateurController::class,"show"]);
Route::post('/utilisateur/store', [UtilisateurController::class,"store"]);
Route::post('/utilisateur/login', [UtilisateurController::class, 'login']);
Route::put('/utilisateur/update/{id}',[UtilisateurController::class,"update"]);

//Apres que l'utilisateurs se soit authentifié

Route::group(['middleware'=>['auth:sanctum']],function(){

    //

    Route::get('/utilisateur/index',[UtilisateurController::class,"index"]);
    //

    Route::get('/utilisateur/logout', [UtilisateurController::class, 'logout']);
//
Route::get('/utilisateur/gardien', [UtilisateurController::class, 'gardien']);

//
Route::delete('/utilisateur/delete/{id}',[UtilisateurController::class,"destroy"]);

//créér un utilisateur pour les admins
Route::post('/utilisateur/create', [UtilisateurController::class,"create"]);

//Definition des routes pour l'API Priorite Incident
 Route::get('/prioriteincident/index',[pIncident::class,"index"]);
Route::get('/prioriteincident/show/{id}',[pIncident::class,"show"]);
Route::post('/prioriteincident/store', [pIncident::class,"store"]);
Route::put('/prioriteincident/update/{id}',[pIncident::class,"update"]);
Route::delete('/prioriteincident/delete/{id}',[pIncident::class,"destroy"]);

// Definition des routes pour l'API Incident
Route::get('/incident/index',[IncidentController::class,"index"]);
Route::get('/incident/show/{id}',[IncidentController::class,"show"]);
Route::post('/incident/store', [IncidentController::class,"store"]);
Route::put('/incident/update/{id}',[IncidentController::class,"update"]);
Route::delete('/incident/delete/{id}',[IncidentController::class,"destroy"]);

// Definition des routes pour l'API StatutIncident
Route::get('/statutincident/index',[StatutIncidentController::class,"index"]);
Route::get('/statutincident/show/{id}',[StatutIncidentController::class,"show"]);
Route::post('/statutincident/store', [StatutIncidentController::class,"store"]);
Route::put('/statutincident/update/{id}',[StatutIncidentController::class,"update"]);
Route::delete('/statutincident/delete/{id}',[StatutIncidentController::class,"destroy"]);

});
