<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Repositorio\Log\LogRepositorio;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Http\Request;

class LogController extends Controller
{
    protected $logRepositorio;
    protected $path;

    public function __construct()
    {
        $this->logRepositorio = new LogRepositorio();
        $this->path = 'adm.';
    }

    protected function limparBusca($busca = 'data'){
        if(!empty( session()->get($busca) ) ){
            session()->put($busca,'');
        }
    }

    public function lista()
    {
        return view( $this->path.'log.lista', ["logs" => $this->logRepositorio->lista(), 'empresa' => UtilRepositorio::getEmpresasId(['id', 'nome'])]);
    }

    public function detalhesId($id)
    {
        if ($busca = $this->logRepositorio->detalhes($id)) {
            return view($this->path.'log.detalhes', ["log" => $busca, 'empresa' => UtilRepositorio::getEmpresasId(['id', 'nome'])]);
        }
        return redirect()->back()->with('msg-error', 'Erro ao buscar o log, log não encontrado');
    }

    public function busca(Request $busca)
    {
        if (empty($busca->input('data')) && empty($busca->input('nome'))) {
            return redirect()->back()->with('msg-error', 'Informe algums dos campos');
        }
        $log = $this->logRepositorio->busca($busca->input());

        if (empty($log)) {
            return redirect()->back()->with('msg-error', 'Não a dados para esse log!');
        }
        return view($this->path.'log.lista', ['logs' => $log, 'empresa' => UtilRepositorio::getEmpresasId(['id', 'nome'])]);
    }

    public function buscaData(Request $busca){
        $logBusca = $busca->all();
       
        if(isset($logBusca['data'])){
            session()->put('data',$logBusca);
        }
        if(empty($logBusca['data']) && empty(session()->get('data')))
        {
            $this->limparBusca('data');
            return redirect()->back()->with('msg-error','Uma data ou o nome');
        }
        if(empty($logBusca['data'])){
            $logBusca= session()->get('data');
        }
       
     
        if(!empty($busca = $this->logRepositorio->busca($logBusca) ))
        {  
            return view($this->path.'log.lista', ['titulo' => "Resultados ", 'logs' => $busca,'empresa'=>UtilRepositorio::getEmpresasId(['id','nome'])]);
        }
        $this->limparBusca('data');
        
        return redirect()->to(route('adm-lista-log'))->with('msg-error','Log não encontrado');

    }

    public function buscaNome(Request $busca){
        $logBusca = $busca->all();
       
        if(isset($logBusca['nome'])){
            session()->put('nome',$logBusca);
        }
        if(empty($logBusca['nome']) && empty(session()->get('nome')))
        {
            $this->limparBusca('nome');
            return redirect()->back()->with('msg-error','Uma data ou o nome');
        }
        if(empty($logBusca['nome'])){
            $logBusca= session()->get('nome');
        }
       
     
        if(!empty($busca = $this->logRepositorio->busca($logBusca) ))
        {  
            return view($this->path.'log.lista', ['titulo' => "Resultados ", 'logs' => $busca,'empresa'=>UtilRepositorio::getEmpresasId(['id','nome'])]);
        }
        $this->limparBusca('data');
        
        return redirect()->to(route('adm-lista-log'))->with('msg-error','Log não encontrado');

    }
}
