<?php

namespace App\Repositorio\Usuario;

use App\Models\Cliente\Cliente;
use App\Models\Empresa\Empresa;
use App\Models\User;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Support\Facades\Auth;


class GraficoRepositorio
{
    protected $clienteModel;
    protected $empresaModel;

    public function __construct()
    {
        $this->clienteModel = new Cliente();
        $this->empresaModel = new Empresa();
    }

    public function graficoClienteCidade($empresa = 0)
    {
       
        $empresa ='';
       
        $empresa = $this->empresaModel->where('id', Auth::user()->id_empresa)->get(['id','nome']);
       
        $cidade = [];
        foreach($empresa as $emp)
        {
             $cidade[$emp->nome] = $this->gerar($emp->id);
        }  
        return $cidade;     
    }

    public function getTotalCidade($empresa, $tipoRetorno = "cidade")
    {
        $busca = '';
        
            $busca = $this->clienteModel->where('id_empresa', Auth::user()->id_empresa)->get();
        
        $cidade = [];
        $count = [];
        $filtro =[];
        foreach ($busca as $cliente) {
            $filtro[] = $cliente->cidade;
        }
        $cidade = array_unique($filtro);
        foreach ($cidade as $cid) {
            $count[$cid] = $this->clienteModel->where('id_empresa', $empresa)->where('cidade', $cid)->count();
        }
        if (!empty($tipoRetorno)) {
            if ($tipoRetorno == 'cidade') {
                return $cidade;
            } else {
                return $count;
            }
        }
    }

    public function gerar($empresa = 1)
    {
        $grafico = [
            "cidade" => $this->getTotalCidade($empresa),
            "count" => $this->getTotalCidade($empresa, 'count')
        ];

        $data   = "";

        $format = "";
        $label = "";
        $count = "";
        $datanew = "";
        $newFormat = "";

        foreach ($grafico['count'] as $key => $value) {
            # code...
            $data .= "['{$key}'," . intval($value) . "],";
            $label .= "'{$key}'" . ',';
            $count .= "{$value}" . ',';
        }

        $newFormat = "[" . rtrim($label, ',') . "]";
        $datanew =  "[" . rtrim($count, ',') . "]";

        $grafico = [
            "cidade" => $newFormat,
            "count" => $datanew

        ];

        $format = rtrim($data, ',');

        return $grafico;
    }

}