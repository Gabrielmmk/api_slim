<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model{
    public $timestamps = false;

    protected $fillable = [ 

        'nome', 'email', 'telefone', 'senha', 'data'
    ];
}