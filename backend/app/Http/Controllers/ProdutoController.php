<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Repositories\ProdutoRepository;
use Illuminate\Database\QueryException;

class ProdutoController extends Controller
{

    public function searchProdutos(Request $request){
        try {
            return ProdutoRepository::getProduto($request->tipo_busca,$request->busca_produto);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

}