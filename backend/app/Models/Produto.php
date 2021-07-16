<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{


    protected $table = 'produtos';
    protected $primaryKey  = 'id';

    //public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'preco',
        'referencia'
    ];

    protected $casts = [];



    public function produtos()
    {
        return $this->belongsToMany(Fornecedor::class, 'produtos_fornecedores', 'produtos_id', 'fornecedores_id');
    }





}