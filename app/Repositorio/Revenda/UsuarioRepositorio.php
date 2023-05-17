<?php

namespace App\Repositorio\Revenda;

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

    

    public function detalhesId($id)
    {
        if(!empty($busca = $this->usuarioModel->where('id',$id)->get()->first())){
            return $busca;
        }
    }

  
}