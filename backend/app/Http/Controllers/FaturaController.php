<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fatura;
use App\Models\Produto;
use App\Models\ProdutoFatura;
use App\Repositories\FaturaRepository;
use App\Repositories\ProdutoRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Date;

class FaturaController extends Controller
{

    public function cadastrarFatura(Request $request){
        try {
            return FaturaRepository::createFatura($request);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public function adicionarProduto(Request $request){
        try {
            return ProdutoRepository::getProdutoById($request->id);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public function historicoFaturas(){
        try {
            return FaturaRepository::getFaturas();
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public function historicoFaturasId(Request $request){
        try {
            return FaturaRepository::getFaturaById($request->id);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

}