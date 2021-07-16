<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('produtos')->insert(array(
            [
            'nome' => 'Mouse',
            'preco' => '10.00',
            'referencia' => 'MO101'
            ],
        [
            'nome' => 'Caneta',
            'preco' => '1.50',
            'referencia' => 'CA111',
        ],
        [
            'nome' => 'Fone',
            'preco' => '15.00',
            'referencia' => 'FO777'
        ],
        [
            'nome' => 'Tapete',
            'preco' => '25.99',
            'referencia' => 'TA908',
        ],
        [
            'nome' => 'Cadeira',
            'preco' => '50.00',
            'referencia' => 'CAD54',
        ]
        ));

        DB::table('fornecedores')->insert(array(
            [
            'nome' => 'FasterUp'
            ],
        [
            'nome' => 'RolyX'
        ],
        [
            'nome' => 'MartiMadeira'
        ],
        [
            'nome' => 'Carpley'
        ],
        [
            'nome' => 'Madex'
        ]
        ));

        DB::table('produtos_fornecedores')->insert(array(
            [
            'produtos_id' => '1',
            'fornecedores_id' => '1'
            ],
        [
            'produtos_id' => '1',
            'fornecedores_id' => '2'
        ],
        [
            'produtos_id' => '2',
            'fornecedores_id' => '3'
        ],
        [
            'produtos_id' => '3',
            'fornecedores_id' => '4'
        ],
        [
            'produtos_id' => '4',
            'fornecedores_id' => '5'
        ],
        [
            'produtos_id' => '5',
            'fornecedores_id' => '1'
        ],
        [
            'produtos_id' => '5',
            'fornecedores_id' => '2'
        ]
        ));
    }
}
