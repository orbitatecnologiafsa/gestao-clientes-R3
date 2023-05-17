<?php

namespace App\Http\Controllers\Revenda;

use App\Http\Controllers\Controller;
use App\Http\Requests\Revenda\EmpresaRequest;
use App\Repositorio\Revenda\EmpresaRepositorio;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    protected $empresaRepositorio;
    protected $path;
    

    public function __construct()
    {
        $this->empresaRepositorio = new EmpresaRepositorio();
        $this->path = 'revenda.';
    }

    public function detalhes($id)
    {
        return view($this->path.'empresa.detalhes',['empresa'=>$this->empresaRepositorio->detalhesId($id),'opcao'=>UtilRepositorio::opcoes()]) ;
    }

    public function lista()
    {
        
        return view($this->path.'empresa.lista',['empresas' => $this->empresaRepositorio->lista(),'opcao'=>UtilRepositorio::opcoes()]);
    }

    public function atualizarId($id)
    {
        if(!empty($busca = $this->empresaRepositorio->detalhesId($id)))
        {
            return view($this->path.'empresa.atualizar',['empresa' => $busca,'opcao'=>UtilRepositorio::opcoes()]);
        }
        return redirect()->back()->with('msg-error','Empresa não encontrada');
        
    }

    public function deletarId($id)
    {
        return view($this->path.'empresa.deletar');
    }

    public function deleteId($id)
    {
      
        
       if($this->empresaRepositorio->deletarId($id)){
        return redirect()->route('revenda-empresa-lista')->with('msg-success','Empresa excluida com sucesso!');
       }
       return redirect()->back()->with('msg-error','Falha ao deletar empresa!');
    }
    public function cadastro()
    {
        return view($this->path.'empresa.criar',['opcao'=>UtilRepositorio::opcoes()]);
    }

    public function cadastroPost(EmpresaRequest $empresa)
    {
         
        if($this->empresaRepositorio->cadastroEupdate($empresa->all())){
            return redirect()->back()->with('msg-success','Empresa cadastrado com sucesso!');
        }
        return redirect()->back()->with('msg-error','Falha ao cadastrar o empresa!');
    }

    public function atualizarPutId(EmpresaRequest $empresa,$id)
    {
        if($this->empresaRepositorio->cadastroEupdate($empresa->all(),'UP',$id)){
            return redirect()->back()->with('msg-success','Empresa atualizada com sucesso!');
        }
        return redirect()->back()->with('msg-error','Falha ao atualizar o empresa!');
    }
}
