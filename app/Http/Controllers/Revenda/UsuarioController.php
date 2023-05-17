<?php

namespace App\Http\Controllers\Revenda;

use App\Http\Controllers\Controller;
use App\Http\Requests\Revenda\UsuarioRequest;
use App\Repositorio\Revenda\UsuarioRepositorio;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $usuarioRepositorio;
    protected $path;


    public function __construct()
    {
        $this->usuarioRepositorio = new UsuarioRepositorio();
        $this->path = 'revenda.';
    }

  
    public function detalhesId($id)
    {
        return view($this->path.'usuario.detalhes',['usuarios' => $this->usuarioRepositorio->detalhesId($id) ,'empresas'=>UtilRepositorio::getEmpresasId(),'nivel' => UtilRepositorio::nivel(),'opcao'=>UtilRepositorio::opcoes()]);
    }
    
}
