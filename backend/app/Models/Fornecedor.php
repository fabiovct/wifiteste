<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{


    protected $table = 'fornecedores';
    protected $primaryKey  = 'id';

    //public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome'
    ];

    protected $casts = [];



}