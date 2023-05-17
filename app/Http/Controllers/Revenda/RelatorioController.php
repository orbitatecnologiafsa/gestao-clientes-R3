<?php

namespace App\Http\Controllers\Revenda;

use App\Http\Controllers\Controller;
use App\Repositorio\Revenda\RelatorioRepositorio;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
     //

     protected $relatorioRepositorio;
     protected $path;

     public function __construct()
     {
         $this->relatorioRepositorio = new RelatorioRepositorio();
         $this->path = 'revenda.';
     }
 
     public function relatorioEmpresaCidade(Request $busca)
     {
         $id = $busca->all();
         if(!empty($gerar = $this->relatorioRepositorio->gerarPDF($id))){
             return $gerar;
         }
           return redirect()->back()->with('msg-error','Error ao gerarar relatorio!');
     }
 
     public function relatorioFiltro()
     {
      
         return view($this->path.'relatorio.pagina.empresa-cidade',['empresas' => UtilRepositorio::getEmpresasIdRvenda(['id','nome'])]);
     }
 
}
