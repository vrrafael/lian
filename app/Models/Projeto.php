<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projetos';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'dt_inicio',
        'dt_fim',
        'valor',
        'risco',
        'participantes'
    ];

}
