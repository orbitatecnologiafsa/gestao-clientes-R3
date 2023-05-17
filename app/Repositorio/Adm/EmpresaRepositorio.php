<?php

namespace App\Repositorio\Adm;

use App\Models\Cliente\Cliente;
use App\Models\Empresa\Empresa;
use App\Models\User;
use App\Repositorio\Log\LogRepositorio;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Support\Facades\Auth;

class EmpresaRepositorio
{

    protected $empresaModel;
    protected $clienteModel;
    protected $logRepositorio;
    protected $usuario;

    public function __construct()
    {
        $this->empresaModel = new Empresa();
        $this->clienteModel = new Cliente();
        $this->logRepositorio = new LogRepositorio();
        $this->usuario = new User();
    }

    public function cadastroEupdate($empresa, $metodo = "", $id = '')
    {

        $empresa['cidade']  = mb_strtoupper($empresa['cidade']); 
        $empresa['documento'] = UtilRepositorio::removeMaskCpfCnpj($empresa['documento']);
        $empresa['nome'] = mb_strtoupper($empresa['nome']);
        $empresa['estado'] = mb_strtoupper($empresa['estado']);
        $empresa['responsavel'] = mb_strtoupper($empresa['responsavel']);

        if (!empty($metodo) && $metodo == 'UP' && !empty($id)) {
            $atualizacao = $this->empresaModel->findOrFail($id)->update($empresa);
           

            $this->logRepositorio->inserirLogCliente('Atualização Empresa', Auth::user()->nome, Auth::user()->id, Auth::user()->id_empresa, $id, $empresa['nome'], $empresa['documento']);
            return  $atualizacao;
        }
        $cadastro = $this->empresaModel->create($empresa);

        $this->logRepositorio->inserirLogCliente('Cadastro Empresa', Auth::user()->nome, Auth::user()->id, Auth::user()->id_empresa, $cadastro->id, $cadastro->nome, $cadastro->documento);

        return $cadastro;
    }

    public function lista()
    {
        if (!empty($busca = $this->empresaModel->paginate(15))) {
            return $busca;
        }
        return [];
    }

    public function detalhesId($id)
    {
        if (!empty($busca = $this->empresaModel->where('id', $id)->get()->first())) {
            return $busca;
        }
    }

    public function buscaEmpresa($busca)
    {
        $clientes = $this->clienteModel->where('id_empresa', $busca['empresa'])->paginate(15);
        if (count($clientes) > 0) {
            return   $clientes;
        }
        return [];
    }

    public function deletarId($id)
    {

        $empresa = '';
        $empresaSelecionada = $this->empresaModel->where('id', $id)->get()->first();
        if ($this->clienteModel->where('id_empresa', $id)->delete()) {

            $this->logRepositorio->inserirLogCliente('Deletar Empresa e clientes e usuario', Auth::user()->nome, Auth::user()->id, Auth::user()->id_empresa, $empresaSelecionada->id, $empresaSelecionada->nome, $empresaSelecionada->documento);
            $empresa = $this->empresaModel->where('id', $id)->delete();
            $this->usuario->where('id_empresa',$empresaSelecionada->id)->delete();
            return $empresa;
        }
        $this->logRepositorio->inserirLogCliente('Deletar Empresa e usuario', Auth::user()->nome, Auth::user()->id, Auth::user()->id_empresa, $empresaSelecionada->id, $empresaSelecionada->nome, $empresaSelecionada->documento);

        $empresa = $this->empresaModel->where('id', $id)->delete();
        $this->usuario->where('id_empresa',$empresaSelecionada->id)->delete();
        return $empresa;
    }
}
