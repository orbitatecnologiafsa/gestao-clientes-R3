<?php

namespace App\Repositorio\Revenda;

use App\Models\Cliente\Cliente;
use App\Models\Empresa\Empresa;
use App\Repositorio\Log\LogRepositorio;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClienteRepositorio
{

    protected $clienteModel;
    protected $logRepositorio;
    protected $empresa;

    public function __construct()
    {
        $this->clienteModel = new Cliente();
        $this->logRepositorio = new LogRepositorio();
        $this->empresa = new Empresa();
    }

    public function lista()
    {

        if (!empty($lista = $this->clientes())) {
            return  isset($lista)  ? $lista : [];
        }
    }

    public function ativos()
    {

        if (!empty($lista = $this->clienteGet('status',1))) {
            return  isset($lista)  ? $lista : [];
        }
    }

    public function inativos()
    {


        if (!empty($lista = $this->clienteGet('status',0))) {
            return  isset($lista)  ? $lista : [];
        }
    }



    public function bloqueados()
    {
        if (!empty($lista = $this->clienteGet('bloqueado',1))) {
            return  isset($lista)  ? $lista : [];
        }
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
       
        $clientesNome = $this->buscarCliente('nome',$busca['cliente']);
        $clienteDocumento = $this->buscarCliente('documento',$busca['cliente']);

        
        if (isset($clientesNome[0]->nome)) {
            return  isset($clientesNome[0]->nome)  ? $clientesNome : [];
        }

        if (isset($clienteDocumento[0]->documento)) {
            return   isset($clienteDocumento[0]->documento) ? $clienteDocumento : [];
       }
        
        return [];

    }

    public function buscaClienteEmpresa($busca)
    {

        $clientes = $this->buscarClientesEmpresa($busca['empresa']);

        if (isset($clientes[0]->nome)) {
            return  isset($clientes[0]->nome)  ? $clientes : [];
        }
       
        return [];

    }

    protected function clientes()
    {

        $bus = DB::table('clientes')
        ->join('empresas', 'empresas.id', '=', 'clientes.id_empresa')
        ->where('empresas.revenda','=',1)
        ->select('clientes.*')
        ->paginate(15);

       return $bus;
    }

    protected function clienteGet($campo,$valor)
    {

        $bus = DB::table('clientes')
        ->join('empresas', 'empresas.id', '=', 'clientes.id_empresa')
        ->where('empresas.revenda','=',1)
        ->where("clientes.$campo",'=',$valor)
        ->select('clientes.*')
        ->paginate(15);
        return $bus;

    }

    protected function buscarCliente($campo,$valor)
    {
        
        $bus = DB::table('clientes')
        ->join('empresas', 'empresas.id', '=', 'clientes.id_empresa')
        ->where('empresas.revenda','=',1)
        ->where("clientes.$campo",'LIKE', '%' . $valor . '%')
        ->select('clientes.*')
        ->orderBy('id','desc')
        ->paginate(15);

        return $bus;
    }

    protected function buscarClientesEmpresa($id_empresa)
    {

        $bus = DB::table('clientes')
        ->join('empresas', 'empresas.id', '=', 'clientes.id_empresa')
        ->where('empresas.revenda','=',1)
        ->where('clientes.id_empresa','=',$id_empresa)
        ->select('clientes.*')
        ->orderBy('id','desc')
        ->paginate(15);
        
        return $bus;


    }
}
