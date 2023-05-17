<?php

namespace App\Repositorio\Adm;

use App\Models\Cliente\Cliente;
use App\Repositorio\Log\LogRepositorio;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Support\Facades\Auth;

class ClienteRepositorio
{

    protected $clienteModel;
    protected $logRepositorio;

    public function __construct()
    {
        $this->clienteModel = new Cliente();
        $this->logRepositorio = new LogRepositorio();
    }

    public function lista()
    {

        if (!empty($lista = $this->clienteModel->orderBy('id', 'desc')->paginate(6))) {
            return  count($lista) > 0 ? $lista : [];
        }
    }

    public function ativos()
    {


        if (!empty($lista = $this->clienteModel->where('status', true)->orderBy('id', 'desc')->paginate(6))) {
            return   count($lista) > 0 ? $lista : [];
        }
    }

    public function inativos()
    {


        if (!empty($lista = $this->clienteModel->where('status', false)->orderBy('id', 'desc')->paginate(7))) {
            return   count($lista) > 0 ? $lista : [];
        }
    }



    public function bloqueados()
    {


        if (!empty($lista = $this->clienteModel->where('bloqueado', true)->orderBy('id', 'desc')->paginate(7))) {
            return   count($lista) > 0 ? $lista : [];
        }

        return [];
    }

    public function cadastro($cliente)
    {

        $cliente['valor'] = UtilRepositorio::parse_money($cliente['valor']);
        $cliente['nome'] = mb_strtoupper($cliente['nome']);
        $cliente['cidade'] = mb_strtoupper($cliente['cidade']);
        $cliente['documento'] = UtilRepositorio::removeMaskCpfCnpj($cliente['documento']);
        $cadastro = $this->clienteModel->create($cliente);
        if ($cadastro) {
            $this->logRepositorio->inserirLogCliente('Cadastro de cliente', Auth::user()->nome, Auth::user()->id, Auth::user()->id_empresa, $cadastro->id, $cadastro->nome, $cadastro->documento);
            return true;
        }
        return false;
    }

    public function atualizacao($cliente, $id)
    {

        $cliente['valor'] = UtilRepositorio::parse_money($cliente['valor']);
        $cliente['nome'] = mb_strtoupper($cliente['nome']);
        $cliente['cidade'] = mb_strtoupper($cliente['cidade']);
        $cliente['documento'] = UtilRepositorio::removeMaskCpfCnpj($cliente['documento']);
        $atualizacao = $this->clienteModel->findOrFail($id)->update($cliente);
        if ($atualizacao) {
            $this->logRepositorio->inserirLogCliente('Atualização de cliente', Auth::user()->nome, Auth::user()->id, Auth::user()->id_empresa, $id, $cliente['nome'], $cliente['documento']);
            return true;
        }
        return false;
    }
    public function detalhes($id)
    {


        if (!empty($busca = $this->clienteModel->where('id', $id)->get()->first())) {
            return $busca;
        }


        return [];
    }
    public function buscaCliente($busca)
    {
        UtilRepositorio::status();
        $clientes = $this->clienteModel->where('documento', 'LIKE', '%' . $busca['cliente'] . '%')
        ->orWhere('nome', 'LIKE', '%' . $busca['cliente'] . '%')
        ->orderBy('id', 'desc')
        ->orWhere('status', 'LIKE', '%' . $busca['cliente'] . '%')->orderBy('id', 'desc')
        ->paginate(15);
        if (count($clientes) > 0) {
            return   $clientes;
        }
        return [];
    }

    public function buscaClienteEmpresa($busca)
    {

        $clientes = $this->clienteModel->where('id_empresa', $busca['empresa'])->orderBy('id', 'desc')->paginate(15);
        if (count($clientes) > 0) {
            return   $clientes;
        }
        return [];
    }
}
