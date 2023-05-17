<?php

namespace App\Repositorio\Login;

use App\Repositorio\Log\LogRepositorio;
use Illuminate\Support\Facades\Auth;

class LoginRepositorio
{

    protected $logRepositorio;
    protected $usuarioRepositorio;

    public function __construct()
    {
        $this->logRepositorio = new LogRepositorio();
    }

    public function login($login)
    {
       
       
        if(Auth::attempt(["email" => $login['email'],"password"=>$login['password']])){
          //  $busca = $this->usuarioRepositorio->buscaUsuario($login['email']);
          $this->logRepositorio->inserirLogCliente('Login', Auth::user()->nome, Auth::user()->id, Auth::user()->id_empresa,0,'null','null');

         return true;
           // $this->logRepositorio->iserirLogCliente('login',$busca->nome,$busca->id,$busca->empresa);
        }
        return false;
    }

    public function logout()
    {
        
        $this->logRepositorio->inserirLogCliente('Deslogado', Auth::user()->nome, Auth::user()->id, Auth::user()->id_empresa,0,'null','null');
        Auth::logout();
        return true;
    }
}