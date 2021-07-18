<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_response_adicionar_produto()
    {
            $response = $this->json('POST', 'api/fatura/adicionar-produto', [
                'id' => 1
            ]);

        $response->assertStatus(200);
    }

    public function test_response_search_produtos_nome()
    {
            $response = $this->json('POST', 'api/produtos/search-produtos', [
                'tipo_busca' => 'nome',
                'busca_produto'=>'a'
            ]);


        $response->assertStatus(200);
    }

    public function test_response_search_produtos_referencia()
    {
            $response = $this->json('POST', 'api/produtos/search-produtos', [
                'tipo_busca' => 'referencia',
                'busca_produto'=>'a'
            ]);


        $response->assertStatus(200);
    }
}
