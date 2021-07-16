<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProdutoFornecedor extends Model
{


    protected $table = 'produtos_fornecedores';

    //public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'produtos_id',
        'fornecedores_id'
    ];

    protected $casts = [];



}