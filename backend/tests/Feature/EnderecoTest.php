<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnderecoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_response_get_endereco()
    {
        $response = $this->json('POST', 'api/endereco/buscar-dados', [
            'cep' => '02460080'
        ]);


        $response->assertStatus(200);
    }
}
