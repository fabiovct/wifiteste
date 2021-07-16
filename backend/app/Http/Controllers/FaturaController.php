<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fatura;
use App\Models\Produto;
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
            $fatura->cep = $request->cep;
            $fatura->uf = $request->uf;
            $fatura->cidade = $request->cidade;
            $fatura->bairro = $request->bairro;
            $fatura->rua = $request->rua;
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

    public function adiconarProduto(Request $request){
        try {
            $produto = Produto::where('id',$request->id)->with('produtos')->first();
            return response()->json($produto);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public function historicoFaturas(){
        try {
            $faturas = Fatura::with('itens')->get();
            
            return response()->json($faturas);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

}

/*
O cliente necessita ter o o 
histórico completo das vendas, 
com seus itens, 
valor total, 
data e 
endereço de entrega completo;
*/