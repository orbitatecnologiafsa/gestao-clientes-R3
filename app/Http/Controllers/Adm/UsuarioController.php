<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adm\UsuarioRequest;
use App\Repositorio\Adm\UsuarioRepositorio;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $usuarioRepositorio;
    protected $path;


    public function __construct()
    {
        $this->usuarioRepositorio = new UsuarioRepositorio();
        $this->path = 'adm.';
    }

    public function cadastrar()
    {
        return view($this->path.'usuario.criar',['empresas'=>UtilRepositorio::getEmpresasId(['id','nome']),'nivel' => UtilRepositorio::nivel()]);
    }
    
    public function cadastroPost(UsuarioRequest $usuario)
    {
       if($this->usuarioRepositorio->cadastroOrUpdate($usuario->all())){
            return redirect()->back()->with('msg-success','Usuario cadastrado com sucesso');
       }
       return redirect()->back()->with('msg-error','Ocorreu um erro ao tentar cadastrar usuario');
    }

    public function atualizarPut(UsuarioRequest $usuario,$id)
    {
       if($this->usuarioRepositorio->cadastroOrUpdate($usuario->all(),"UP",$id)){
            return redirect()->back()->with('msg-success','Usuario atualizado com sucesso');
       }
       return redirect()->back()->with('msg-error','Ocorreu um erro ao tentar atualizar usuario');
    }
    public function atualizarId($id)
    {
        
        return view($this->path.'usuario.atualizar',['usuarios' => $this->usuarioRepositorio->detalhesId($id) ,'empresas'=>UtilRepositorio::getEmpresasId(['id','nome']),'nivel' => UtilRepositorio::nivel()]);
    }

    public function deletarId($id)
    {
        return view($this->path.'usuario.deletar');
    }
    public function deleteId()
    {
    }

    public function lista()
    {
        return view($this->path.'usuario.lista',['usuarios'=> $this->usuarioRepositorio->lista(),'empresas'=>UtilRepositorio::getEmpresasId(),'nivel'=>UtilRepositorio::nivel(),'bloqueio'=>UtilRepositorio::opcoes()]);
    }

    public function detalhesId($id)
    {
        return view($this->path.'usuario.detalhes',['usuarios' => $this->usuarioRepositorio->detalhesId($id) ,'empresas'=>UtilRepositorio::getEmpresasId(),'nivel' => UtilRepositorio::nivel(),'opcao'=>UtilRepositorio::opcoes()]);
    }
}
