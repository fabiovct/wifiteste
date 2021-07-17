<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProdutoFatura extends Model
{


    protected $table = 'produtos_faturas';
    protected $primaryKey  = 'id';

    //public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_produto',
        'preco',
        'id_fatura'
    ];

    protected $casts = [];

    public function produto()
    {
        return $this->hasOne(Produto::class,'id', 'id_produto')->with('fornecedores');
    }



}