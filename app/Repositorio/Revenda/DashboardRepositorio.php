<?php

namespace App\Repositorio\Revenda;

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

        $ativos = ($this->clientes('status', 1));
        $inativos = ($this->clientes('status', 0));
        $bloqueados = ($this->clientes('bloqueado', 1));
        $total = ($this->clientes('status', 1, 'sim'));;

        return [
            "ativos" => $ativos,
            "inativos" => $inativos,
            "bloqueados" => $bloqueados,
            "total" => $total
        ];
        
    }

    public function clientesPorEmpresa()
    {

        $empresasID =  UtilRepositorio::getEmpresasIdRvenda(['id']);
        $empresa = [];
        $qtdClientes = [];
        $qtdValor = [];
        $totalValor = 0;
        foreach ($empresasID as $emp) {
            $empresa[$emp->id] = $this->empresa->where('id', $emp->id)->where('revenda', 1)->get()->first();
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


        return [
            "empresas" => $empresa,
            "qtdClientes" => $qtdClientes,
            "qtdValor" => $qtdValor,
            "total" => $totalValor
        ];
    }

    protected function clientes($campo = "status", $valor = 1, $total = null)
    {
        $busca = $this->empresa->where('revenda', 1)->get();
        $clientes = [];
        
        if (!is_null($total)) {
            
            foreach ($busca as $empresa) {
                $clientes[$empresa->id] = $this->cliente->where('id_empresa', $empresa->id)->count();
            }
            return (array_sum($clientes));
        }
       
        foreach ($busca as $empresa) {
            $clientes[$empresa->id] = $this->cliente->where('id_empresa', $empresa->id)->where($campo, $valor)->get()->count();
        }
        return (array_sum($clientes));
    }
}
