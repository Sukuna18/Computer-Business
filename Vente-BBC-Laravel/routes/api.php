<?php

use App\Http\Resources\UserRessource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::get('users', [App\Http\Controllers\UserController::class, 'index']);
Route::get('users/all', [App\Http\Controllers\UserController::class, 'allUsers']);
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {

    Route::get('user', function (Request $request) {
      return new UserRessource($request->user());
    });
    Route::post('users/logout', function (Request $request) {
      $request->user()->token()->revoke();
      // $user->tokens()->delete();
        // cookie()->forget('token');
        // $request->user()->token()->revoke();
        return response()->json(['message' => 'Logged out'], 200);
      });
  
  });
Route::apiResource('user', App\Http\Controllers\UserController::class)->except(['index']);
Route::apiResource('produits', App\Http\Controllers\ProduitController::class);
Route::apiResource('succursales', App\Http\Controllers\SuccursaleController::class);
Route::apiResource('caracteristiques', App\Http\Controllers\CaracteristiqueController::class);
Route::apiResource('produitCaracteristiques', App\Http\Controllers\ProduitCaracteristiqueController::class);
Route::get('produits/search/{code}', [App\Http\Controllers\ProduitController::class, 'searchProduit']);
Route::apiResource('commandes', App\Http\Controllers\CommandeController::class);