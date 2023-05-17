<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Repositorio\Usuario\RelatorioRepositorio;
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
        $this->path = 'user.';
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
        return view($this->path.'relatorio.pagina.empresa-cidade',['empresas' => UtilRepositorio::getEmpresasId(['id','nome'])]);
    }
}
