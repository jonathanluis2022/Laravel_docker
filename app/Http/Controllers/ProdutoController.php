<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected $produto;
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index(Request $request)
    {
        $pesquisar = $request->input('pesquisar');
        
        // Apenas realiza a pesquisa se o campo "pesquisar" estiver preenchido
        $findProduto = [];
        if (!empty($pesquisar)) {
            $findProduto = $this->produto->getProdutoPesquisar(search: $pesquisar);
        };
    
        return view('pages.produtos.paginacao', compact('findProduto'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = Produto::find($id);
        $buscarRegistro->delete();

        return response()->json(['success' => true]);
    }
}
