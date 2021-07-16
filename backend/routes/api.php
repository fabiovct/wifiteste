<?php

use App\Http\Controllers\FaturaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::get('/user', [UserController::class, 'index']);

Route::group(['prefix' => 'produtos'], function () {
    Route::post('search-produtos', [ProdutoController::class, 'searchProdutos']);
});

Route::group(['prefix' => 'fatura'], function () {
    Route::post('cadastrar-fatura', [FaturaController::class, 'cadastrarFatura']);
    // Route::post('adicionar-produto', [FaturaController::class, 'adiconarProduto']);
});
