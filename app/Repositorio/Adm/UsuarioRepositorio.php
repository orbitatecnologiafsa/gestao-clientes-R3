<?php

namespace App\Repositorio\Adm;

use App\Models\User;
use App\Repositorio\Log\LogRepositorio;
use Illuminate\Support\Facades\Auth;

class  UsuarioRepositorio
{

    protected $usuarioModel;
    protected $logRepositorio;
    public function __construct()
    {
        $this->usuarioModel = new User();
        $this->logRepositorio = new LogRepositorio();
    }

    public function buscaUsuario($email,$senha)
    {
        $login = $this->usuarioModel->where('email',$email)->get();
        return $login;
    }

    public function cadastroOrUpdate($usuario,$metodo = "",$id = "")
    {

        
        //$usuario['nome'] = mb_strtoupper($usuario['nome']);
        $usuario['bloqueado'] = 0;
       if(isset($usuario['password']) && !empty($usuario['password'])){
          $usuario['password'] = bcrypt($usuario['password']);
       }
       if(!isset($usuario['password'])){
         unset($usuario['password']);
       }
        
        if(!empty($metodo) && !empty($id)){
           
            $atualizacao = $this->usuarioModel->findorFail($id)->update($usuario);
       
            $this->logRepositorio->inserirLogCliente('Atualização Usuario', Auth::user()->nome, Auth::user()->id, Auth::user()->id_empresa, $id,$usuario['nome'], 'Não informado');
            return $atualizacao;
        }

        $cadastro = $this->usuarioModel->create($usuario);
        $this->logRepositorio->inserirLogCliente('Cadastro Usuario', Auth::user()->nome, Auth::user()->id, Auth::user()->id_empresa, $cadastro['id'], $usuario['nome'], 'Não informado');

        return $cadastro;

    }

    public function lista()
    {
        if (Auth::user()->nivel == 0) {

            if (!empty($lista = $this->usuarioModel->paginate(15))) {
                return   count($lista) > 0 ? $lista : [];
            }
        }
    }

    public function detalhesId($id)
    {
        if(!empty($busca = $this->usuarioModel->where('id',$id)->get()->first())){
            return $busca;
        }
    }

    public function deletarId($id)
    {
        if($this->usuarioModel->where('id', $id)->delete()){
            return true;
        }
        return false;
    }
}