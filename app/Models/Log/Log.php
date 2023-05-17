<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_responsavel',
        'nome_responsavel',
        'empresa',
        'metodo',
        'id_cliente',
        'nome_cliente',
        'documento_cliente'
    ];
}
