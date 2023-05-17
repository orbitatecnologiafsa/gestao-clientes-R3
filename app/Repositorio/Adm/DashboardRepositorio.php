<?php

namespace App\Repositorio\Adm;

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

        $ativos = $this->cliente->where('status', true)->count();
        $inativos = $this->cliente->where('status', false)->count();
        $bloqueados = $this->cliente->where('bloqueado', true)->count();
        $total = $this->cliente->all()->count();

        return [
            "ativos" => $ativos,
            "inativos" => $inativos,
            "bloqueados" => $bloqueados,
            "total" => $total
        ];
    }

    public function clientesPorEmpresa()
    {

        $empresasID =  UtilRepositorio::getEmpresasId(['id']);
        $empresa = [];
        $qtdClientes = [];
        $qtdValor = [];
        $totalValor = 0;
        foreach ($empresasID as $emp) {
            $empresa[$emp->id] = $this->empresa->where('id', $emp->id)->get()->first();
        }
        foreach ($empresa as $emp) {
            $qtdClientes[$emp->nome] = $this->cliente->where('id_empresa', $emp->id)->where('status', true)->count();
            $qtdValor[$emp->nome] = $this->cliente->where('id_empresa', $emp->id)->where('status', true)->where('bloqueado', false)->sum('valor');
        }
        foreach ($qtdClientes as $key => $value) {
            //  echo $key.', ';
        }
        foreach ($qtdValor as $key) {
            $totalValor += doubleval($key);
        }

        if (Auth::user()->nivel ==  0) {
            return [
                "empresas" => $empresa,
                "qtdClientes" => $qtdClientes,
                "qtdValor" => $qtdValor,
                "total" => $totalValor
            ];
        } else {
            return [
                "qtdValor" => $this->cliente->where('id_empresa', Auth::user()->id_empresa)->where('status', true)->where('bloqueado', false)->sum('valor')
            ];
        }
    }
}
