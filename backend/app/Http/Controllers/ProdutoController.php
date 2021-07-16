<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Database\QueryException;

class ProdutoController extends Controller
{

    public function searchProdutos(Request $request){
        try {
            if($request->tipo_busca=='nome'){
                $produtos = Produto::where('nome','like','%'.$request->busca_produto.'%')->get();
            }
            if($request->tipo_busca=='referencia'){
                $produtos = Produto::where('referencia','like','%'.$request->busca_produto.'%')->get();
            }
            
            return response()->json($produtos);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

}