<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Database\QueryException;

class EnderecoController extends Controller
{

    public function buscarDados(Request $request){
        try {

            $client = new Client();
            $cep = $request->cep;
            $url = "https://viacep.com.br/ws/{$cep}/json/";
            $endereco = $client->request('GET', $url);

            $data = json_decode($endereco->getBody()->getContents(), true);
            return $data;
            
            // return response()->json($data);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

}