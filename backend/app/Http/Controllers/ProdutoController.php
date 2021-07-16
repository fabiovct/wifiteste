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
            if(isset($request->nome)){
                $produtos = Produto::where('nome','like','%'.$request->nome.'%')->get();
            }
            if(isset($request->referencia)){
                $produtos = Produto::where('referencia','like','%'.$request->referencia.'%')->get();
            }
            
            return response()->json($produtos);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

}