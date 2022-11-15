<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Nome extends Model{

    protected $table = 'nomes';
    
}


class Produto extends Model{
    
    protected $fillable = [ 

        'titulo', 'descricao', 'preco', 'fabricante', 'created_at', 'updated_at'
    ];
}
