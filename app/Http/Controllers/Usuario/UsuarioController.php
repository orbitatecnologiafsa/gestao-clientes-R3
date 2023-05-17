<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Repositorio\Usuario\UsuarioRepositorio;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $usuarioRepositorio;
    protected $path;


    public function __construct()
    {
        $this->usuarioRepositorio = new UsuarioRepositorio();
        $this->path = 'user.';
    }

    public function detalhesId()
    {
        return view($this->path.'usuario.detalhes',['usuarios' => $this->usuarioRepositorio->detalhesId() ,'empresas'=>UtilRepositorio::getEmpresasId(),'nivel' => UtilRepositorio::nivel(),'opcao'=>UtilRepositorio::opcoes()]);
    }
}
