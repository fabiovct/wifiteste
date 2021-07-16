<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fatura;
use App\Models\ProdutoFatura;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Date;

class FaturaController extends Controller
{

    public function cadastrarFatura(Request $request){
        try {

            // return $request->itens;

            $fatura = new Fatura();
            $fatura->preco_total = $request->preco_total;
            $fatura->data_venda = Date::now();
            $fatura->endereco_entrega = $request->endereco_entrega;
            $fatura->save();


        

            foreach($request->itens as $iten){
                $produto_fatura = new ProdutoFatura();
                $produto_fatura->id_fatura = $fatura->id;
                $produto_fatura->preco = $iten['preco'];
                $produto_fatura->id_produto = $iten['id_produto'];
                $produto_fatura->save();
            }

            return response()->json('Fatura Cadastrada Com Sucesso');
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

}