<?php

namespace App\Repositorio\Usuario;

use App\Models\Cliente\Cliente;
use App\Models\Empresa\Empresa;
use App\Models\User;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Support\Facades\Auth;


class DashboardRepositorio
{

    protected $cliente;
    protected $empresa;
    protected $usuario;


    public function __construct()
    {
        $this->cliente = new Cliente();
        $this->empresa = new Empresa();
        $this->usuario = new User();
    }

    public function contadorClientes()
    {

        $ativos = $this->cliente->where('status', true)->where('id_empresa', Auth::user()->id_empresa)->count();
        $inativos = $this->cliente->where('status', false)->where('id_empresa', Auth::user()->id_empresa)->count();
        $bloqueados = $this->cliente->where('bloqueado', true)->where('id_empresa', Auth::user()->id_empresa)->count();
        $total = $this->cliente->where('id_empresa', Auth::user()->id_empresa)->count();

        return [
            "ativos" => $ativos,
            "inativos" => $inativos,
            "bloqueados" => $bloqueados,
            "total" => $total
        ];
    }

    public function clientesPorEmpresa()
    {
        return [
            "qtdValor" => $this->cliente->where('id_empresa', Auth::user()->id_empresa)->where('status', true)->where('bloqueado', false)->sum('valor')
        ];
    }
}
