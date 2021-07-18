<?php

namespace App\Repositories;

use App\Models\Produto;
use Illuminate\Database\QueryException;

class ProdutoRepository 
{

    public static function getProdutoById($id){
        try {
            $produto = Produto::where('id',$id)->with('fornecedores')->first();
            return response()->json($produto);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public static function getProduto($tipo_busca,$busca_produto){
        try {
            if($tipo_busca=='nome'){
                $produtos = Produto::where('nome','like','%'.$busca_produto.'%')->get();
            }
            if($tipo_busca=='referencia'){
                $produtos = Produto::where('referencia','like','%'.$busca_produto.'%')->get();
            }
            
            return response()->json($produtos);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

}