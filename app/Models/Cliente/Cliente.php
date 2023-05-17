<?php

namespace App\Models\Cliente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'cidade',
        'id_empresa',
        'valor',
        'status',
        'documento',
        'data_vencimento',
        'qtd_carencia',
        'data_bloqueio',
        'bloqueado'
    ];
}
