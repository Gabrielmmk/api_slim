<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TabelaExercicio extends Model{
    public $timestamps = false;

    protected $fillable = [ 
        'id', 'dia', 'nomeExercicio', 'repeticoes', 'series'
    ];
}