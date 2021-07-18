<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FaturaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_response_get_faturas()
    {
        $response = $this->json('GET', 'api/fatura/historico-faturas');


        $response->assertStatus(200);
    }

    public function test_response_get_faturas_by_id()
    {
        $response = $this->json('GET', 'api/fatura/historico-faturas/1');


        $response->assertStatus(200);
    }

    public function test_response_cadastrar_fatura()
    {
        $response = $this->json('POST', 'api/fatura/cadastrar-fatura',[
            'preco_total'=>1.15,
            'cep'=>'02460080',
            'uf'=>'SP',
            'cidade'=>'São Paulo',
            'bairro'=>'Sta. Teresinha',
            'rua'=>'Rua Dona martinha 369',
            'itens'=>[
                ['id'=>1,'preco'=>1.15]
            ]
        ]);

        $response->assertStatus(200);
    }
}
