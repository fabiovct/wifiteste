<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Database\QueryException;

class ViaCepService 
{

    public static function dadosEndereco($cep){
        try {

            $client = new Client();
            $url = "https://viacep.com.br/ws/{$cep}/json/";
            $endereco = $client->request('GET', $url);

            $data = json_decode($endereco->getBody()->getContents(), true);
            return $data;
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

}