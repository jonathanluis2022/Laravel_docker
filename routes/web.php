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
});
