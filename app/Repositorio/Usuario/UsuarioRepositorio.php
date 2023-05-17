<?php

namespace App\Repositorio\Usuario;

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
        $usuario = $this->usuarioModel->where('email',$email)->get();
        return $usuario;
    }

    public function detalhesId()
    {
        if(!empty($busca = $this->usuarioModel->where('id',Auth::user()->id)->get()->first())){
            return $busca;
        }
    }
}