<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;


//service 
Route::get('/prestataires/{id}/services', [ServiceController::class, 'index3']);
// Route::get('/services', [ServiceController::class, 'index3']);
Route::post('/prestataires/{id}/services', [ServiceController::class, 'store']);
// Route::post('/services', [ServiceController::class, 'store']);
// Route::delete('/services/{id}', [ServiceController::class, 'deleteService']);
// Route::get('/services/{id}', [ServiceController::class, 'getService']); 
// Route::put('/services/{id}', [ServiceController::class, 'updateService']); 

Route::get('/prestataires/{prestataire_id}/services/{service_id}', [ServiceController::class, 'getService']);
Route::put('/prestataires/{prestataire_id}/services/{service_id}', [ServiceController::class, 'updateService']);
Route::delete('/prestataires/{prestataire_id}/services/{service_id}', [ServiceController::class, 'deleteService']);

//prestataire 
use App\Http\Controllers\PrestataireController;

Route::get('/prestataires', [PrestataireController::class, 'index']);
Route::post('/prestataires', [PrestataireController::class, 'store']);
Route::get('/prestataires/{id}', [PrestataireController::class, 'show']);
Route::put('/prestataires/{id}', [PrestataireController::class, 'update']);
Route::delete('/prestataires/{id}', [PrestataireController::class, 'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
