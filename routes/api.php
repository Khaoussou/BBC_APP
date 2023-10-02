<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaracteristiqueController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\SucursaleController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource("/sucursales", SucursaleController::class);
    Route::apiResource("/produits", ProduitController::class);
    Route::apiResource("/commandes", CommandeController::class);
    Route::apiResource("/caract", CaracteristiqueController::class);
    Route::apiResource("/marques", MarqueController::class);
    Route::apiResource("/unites", UniteController::class);
    Route::get("/search/{code}", [ProduitController::class, "searchProcuct"]);
    Route::get("/value/{idCaract}", [CaracteristiqueController::class, "valueCaract"]);
    Route::get("/logout", [AuthController::class, "logout"]);
});

Route::apiResource("/users", UserController::class);
