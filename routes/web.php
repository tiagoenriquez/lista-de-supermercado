<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/item/faltantes');
});

Route::prefix('/item')->group(function () {
    Route::get('/ameaca/{id}', [ItemController::class, 'ameacar'])->name('ameacar-item');
    Route::get('/cadastro-de-faltante', [ItemController::class, 'cadastrarFaltante'])->name('cadastrar-item-faltante');
    Route::get('/digitar-trecho', [ItemController::class, 'digitarTrecho'])->name('digitar-trecho-de-item');
    Route::get('/edicao/{id}', [ItemController::class, 'editar'])->name('editar-item');
    Route::get('/faltantes', [ItemController::class, 'listarFaltantes'])->name('itens-faltantes');
    Route::post('/inserir-faltante', [ItemController::class, 'inserirFaltante'])->name('inserir-item-faltante');
    Route::post('/pesquisa', [ItemController::class, 'procurar'])->name('pesquisar-item');
    Route::put('/atualizar/{id}', [ItemController::class, 'atualizar'])->name('atualizar-item');
    Route::delete('/excluir/{id}', [ItemController::class, 'excluir'])->name('excluir-item');
});

Route::prefix('compra')->group(function () {
    Route::get('/cadastro', [CompraController::class, 'cadastrar'])->name('cadastrar-compra');
    Route::get('/lista', [CompraController::class, 'listar'])->name('compras');
    Route::get('/itens/{id}', [CompraController::class, 'listarItens'])->name('itens-de-compra');
    Route::post('/inserir', [CompraController::class, 'inserir'])->name('inserir-compra');
});
