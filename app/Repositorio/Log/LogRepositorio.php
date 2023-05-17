<?php

namespace App\Repositorio\Log;

use App\Models\Log\Log;

use Illuminate\Support\Facades\Auth;

class LogRepositorio
{


    protected $logModel;

    public function __construct()
    {
        $this->logModel = new Log();
    }

    public function inserirLogCliente($metodo, $nome_responsavel, $id_responsavel, $empresa, $id_cliente = "", $nome_cliente = "", $documento_cliente = "")
    {
        $log = [
            "metodo" => $metodo,
            "nome_responsavel" => $nome_responsavel,
            "id_responsavel" => $id_responsavel,
            "empresa" => $empresa,
            "nome_cliente" => $nome_cliente,
            "id_cliente" => $id_cliente,
            "documento_cliente" => $documento_cliente
        ];

        $this->logModel->create($log);
    }

  
    public function detalhes($id)
    {
         if(!empty($busca = $this->logModel->where('id',$id)->get()->first())){
            return $busca;
         }
         return [];
    }


    public function lista()
    {

    

            $logs = $this->logModel->orderBy('id','desc')->paginate(6);
            if (count($logs) > 0) {
                return $logs;
            }
            return [];
       
    }

    public function busca($busca)
    {


        switch ($busca) {
            case !empty($busca['data']):
                $log = $this->logModel->where('created_at', '>=', $busca['data'] . " 00:00:00")->where('created_at', '<=', $busca['data'] . " 23:59:59")->orderBy('id','desc')->paginate(6);
                if (count($log) > 0) {
                    return $log;
                }
                return [];
                break;
            case empty($busca['data']) && !empty($busca['nome']):
                $log = $this->logModel->where('nome_responsavel', 'LIKE', '%' . $busca['nome'] . '%')->orderBy('id','desc')->paginate(6);

                if (count($log) > 0) {
                    return $log;
                }
                break;
            default:
                return [];
        }
    }
}
