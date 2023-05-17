<?php

namespace App\Repositorio\Usuario;

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

        if (!empty($lista = $this->clienteModel->where('id_empresa', Auth::user()->id_empresa)->orderBy('id','desc')->paginate(6))) {
            return   count($lista) > 0 ? $lista : [];
        }
    }

    public function ativos()
    {


        if (!empty($lista = $this->clienteModel->where('id_empresa', Auth::user()->id_empresa)->where('status', true)->orderBy('id','desc')->paginate(6))) {
            return   count($lista) > 0 ? $lista : [];
        }
    }

    public function inativos()
    {


        if (!empty($lista = $this->clienteModel->where('id_empresa', Auth::user()->id_empresa)->where('status', false)->orderBy('id','desc')->paginate(7))) {
            return   count($lista) > 0 ? $lista : [];
        }

    }


    public function bloqueados()
    {


      if (!empty($lista = $this->clienteModel->where('id_empresa', Auth::user()->id_empresa)->where('bloqueado', true)->orderBy('id','desc')->paginate(7))) {
            return   count($lista) > 0 ? $lista : [];
        }
        return [];
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

        if (!empty($busca = $this->clienteModel->where('id', $id)->where('id_empresa', Auth::user()->id_empresa)->get()->first())) {
            return $busca;
        }

        return [];
    }

    public function buscaCliente($busca)
    {
        $clientesNome = $this->clienteModel->where('id_empresa',Auth::user()->id_empresa)->where('nome', 'LIKE', '%' . $busca['cliente'] . '%')->orderBy('id','desc')->paginate(15);
        $clienteDocumento = $this->clienteModel->where('id_empresa',Auth::user()->id_empresa)->where('documento', 'LIKE', '%' . $busca['cliente'] . '%')->orderBy('id','desc')->paginate(15);
        if (count($clientesNome) > 0) {
            return   $clientesNome;
        }
        if (count($clienteDocumento) > 0) {
            return   $clienteDocumento;
        }
        return [];
    }
}
