<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas para rotear o produtos 
|--------------------------------------------------------------------------
| Rota " / " é a rota que vai renderizar na index 
| 
| 
| 
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('produtos')->group(function() {
    Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/cadastrarProduto', [ProdutoController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutoController::class, 'cadastrarProduto'])->name('cadastrar.produto');

    Route::delete('/delete', [ProdutoController::class, 'delete'])->name('produto.delete');


});
