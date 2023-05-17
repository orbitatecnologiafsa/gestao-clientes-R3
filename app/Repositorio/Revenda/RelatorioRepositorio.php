<?php

namespace App\Repositorio\Revenda;


use App\Models\Cliente\Cliente;
use App\Models\Empresa\Empresa;
use App\Repositorio\Util\UtilRepositorio;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Illuminate\Support\Facades\Auth;


class RelatorioRepositorio
{

    protected $usuarioModel;
    protected $clienteModel;
    protected $empresaModel;

    public function __construct()
    {
        $this->clienteModel = new Cliente();
        $this->empresaModel = new Empresa();
    }
    
    public function gerarPDF($dados)
    {
        

        $empresaSelecionada = $this->empresaModel->where('id', $dados['busca'])->where('revenda', 1)->get()->first();
        if(!isset($empresaSelecionada)){
            return false;
        }
        $busca = $this->clienteModel->where('id_empresa', $empresaSelecionada->id)->where('status',1)->where('bloqueado',0)->get();
        if(count($busca) == 0){
           return [];
        }
     
       
        $cidade = $this->getTotalCidade($empresaSelecionada->id,'cidade');
        $count = $this->getTotalCidade($empresaSelecionada->id, 'count');
        $valor = $this->getTotalCidade($empresaSelecionada->id, 'valor');
       
        $pdf = Pdf::loadView('revenda/relatorio/cidade/empresa-cidade', ["clientes" => $busca, "cidade" => $cidade, "count" => $count,'empresas'=>UtilRepositorio::getEmpresasId(['id','nome']),'valores' =>$valor]);
        return $pdf->setPaper('a4')->stream('relatorio.pdf');
    }

    public function getTotalCidade($empresa, $tipoRetorno = "cidade")
    {
        $busca  = [];
        $cidade = [];
        $count  = [];
        $valor  = [];
        
        $busca = $this->clienteModel->where('id_empresa', $empresa)->get();
        
        foreach ($busca as $cliente) {
            $filtro[] = $cliente->cidade;
        }
        $cidade = array_unique($filtro);
        foreach ($cidade as $cid) {
            $valor[$cid] = $this->clienteModel->where('id_empresa', $empresa)->where('status',1)->where('bloqueado',0)->where('cidade', $cid)->sum('valor');
            $count[$cid] = $this->clienteModel->where('id_empresa', $empresa)->where('status',1)->where('bloqueado',0)->where('cidade', $cid)->count();
        }
     
        if (!empty($tipoRetorno)) {
            if ($tipoRetorno == 'cidade') {
                return $cidade;
            } else if ($tipoRetorno == 'valor'){
                return $valor;
            }else{
                return $count;
            }
        }
    }
    
}