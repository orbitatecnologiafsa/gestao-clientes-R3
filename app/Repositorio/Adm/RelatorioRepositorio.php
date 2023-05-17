<?php

namespace App\Repositorio\Adm;

use App\Models\Cliente\Cliente;

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
    }
    
    public function gerarPDF($dados)
    {

        $busca = $this->clienteModel->where('id_empresa', $dados)->where('status',1)->where('bloqueado',0)->get();
        if(count($busca) == 0){
           return [];
        }
     
       
        $cidade = $this->getTotalCidade($dados,'cidade');
        $count = $this->getTotalCidade($dados, 'count');
        $valor = $this->getTotalCidade($dados,'valor');
       
      
 
       
       
        $pdf = Pdf::loadView('adm/relatorio/cidade/empresa-cidade', ["clientes" => $busca, "cidade" => $cidade, "count" => $count,'empresas'=>UtilRepositorio::getEmpresasId(['id','nome']),'valores' => $valor]);
        return $pdf->setPaper('a4')->stream('relatorio.pdf');
    }

    public function getTotalCidade($empresa, $tipoRetorno = "cidade")
    {
        $busca = [];
        $cidade = [];
        $count = [];
        $valor = [];
        
        
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

            if($tipoRetorno == 'valor'){
                return $valor;
            }
            if ($tipoRetorno == 'cidade') {
                return $cidade;
            } else {
                return $count;
            }
        }
    }
    
    public function totalPorEmpresa()
    {

    }

}