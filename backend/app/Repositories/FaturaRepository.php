<?php

namespace App\Repositories;

use App\Models\Fatura;
use App\Models\ProdutoFatura;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Date;

class FaturaRepository 
{

   public static function getFaturas(){
    try {
        $faturas = Fatura::with('itens')->orderBy('data_venda','desc')->get();
        return response()->json($faturas);
    } catch (QueryException $e) {
        return response()->json([
            "error" => $e
        ]);
    }  
   }

   public static function getFaturaById($id){
    try {
        $fatura = Fatura::where('id',$id)->with('itens')->first();
            
        return response()->json($fatura);
    } catch (QueryException $e) {
        return response()->json([
            "error" => $e
        ]);
    }  
   }

   public static function createFatura($dados){
    try {
        $fatura = new Fatura();
        $fatura->preco_total = $dados->preco_total;
        $fatura->data_venda = Date::now();
        $fatura->cep = $dados->cep;
        $fatura->uf = $dados->uf;
        $fatura->cidade = $dados->cidade;
        $fatura->bairro = $dados->bairro;
        $fatura->rua = $dados->rua;
        $fatura->save();


    

        foreach($dados->itens as $iten){
            $produto_fatura = new ProdutoFatura();
            $produto_fatura->id_fatura = $fatura->id;
            $produto_fatura->preco = $iten['preco'];
            $produto_fatura->id_produto = $iten['id'];
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