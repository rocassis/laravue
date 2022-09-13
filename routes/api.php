<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProdutosController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/registrar', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categorias/{categoria?}', [CategoriasController::class, 'index']);
    Route::post('/categoria', [CategoriasController::class, 'store']);
    Route::post('/categoria/{categoria}', [CategoriasController::class, 'update']);
    Route::get('/categoria/deletar/{categoria}', [CategoriasController::class, 'destroy']);

    Route::get('/produtos/{produto?}', [ProdutosController::class, 'index']);
    Route::get('/produtos/fornecedor/{fornecedor}', [ProdutosController::class, 'listagemFornecedor']);
    Route::post('/produto', [ProdutosController::class, 'store']);
    Route::post('/produto/{produto}', [ProdutosController::class, 'update']);
    Route::get('/produto/deletar/{produto}', [ProdutosController::class, 'destroy']);

    Route::get('/pedidos/{pedido?}', [PedidosController::class, 'index']);
    Route::post('/pedido', [PedidosController::class, 'store']);
    Route::post('/pedido/{pedido}', [PedidosController::class, 'update']);
    Route::get('/pedido/deletar/{pedido}', [PedidosController::class, 'destroy']);
    Route::get('/pedidos/aprovar/{pedido?}', [PedidosController::class, 'approve']);
    Route::get('/pedidos/recusar/{pedido?}', [PedidosController::class, 'refuse']);
});
