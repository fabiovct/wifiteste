<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{


    protected $table = 'faturas';
    protected $primaryKey  = 'id';

    //public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_produtos_faturas',
        'preco_total',
        'data_venda',
        'endereco_entrega'
    ];

    protected $casts = [
        'data_venda' => 'datetime'
    ];



}