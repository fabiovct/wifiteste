<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ViaCepService;
use GuzzleHttp\Client;
use Illuminate\Database\QueryException;

class EnderecoController extends Controller
{

    public function buscarDados(Request $request){
        try {

            $cep = explode('-',$request->cep);
            if(isset($cep[1])){
                $cep = $cep[0].$cep[1];
                return ViaCepService::dadosEndereco($cep);
            }else{
                return ViaCepService::dadosEndereco($request->cep);
            }
            
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

}