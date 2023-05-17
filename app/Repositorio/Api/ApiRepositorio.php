<?php


namespace App\Repositorio\Api;

use App\Models\Cliente\Cliente;


class ApiRepositorio
{
    protected $cliente;

    public function __construct()
    {
        $this->cliente = new Cliente();
    }

    public function clienteStatus($documento)
    {


        $cliente = $this->cliente->where('documento', $documento)->get()->first();

        if (!is_null($cliente)) {
            return response()->json([
                "documento" => $cliente->documento,
                "bloqueado" => $cliente->bloqueado == 1 ? true : false,
                "qtd_carencia" => $cliente->qtd_carencia,
                "data_vencimento" => $cliente->data_vencimento,
                "data_bloqueio" => $cliente->data_bloqueio
            ], 200, ['Content-Type' => "application/json"]);
        }
        return response()->json(['error' => "cliente {$documento} não encontrado"], 400, ['Content-Type' => 'application/json']);
    }

    public function backup()
    {
        return response()->download(storage_path().'/app/banco_backup/backup.sql');
    }
}