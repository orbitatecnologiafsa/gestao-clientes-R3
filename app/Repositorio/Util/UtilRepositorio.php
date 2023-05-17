<?php


namespace App\Repositorio\Util;

use App\Models\Empresa\Empresa;
use Illuminate\Support\Facades\Auth;

class  UtilRepositorio
{
    public static function parse_money($number)
    {
        return str_replace(['R$', '.', ','], ['', '', '.'], $number);
    }
    public static function removeMaskCpfCnpj($docuemnto)
    {
        return str_replace("/", "", str_replace('-', "", str_replace(".", "", trim($docuemnto))));
    }

    public static function opcoes($op = "")
    {
        $data = [
            "0" => "NÃO",
            "1" => "SIM"
        ];
        if (!empty($op)) {
            return $data[$op];
        }
        return $data;
    }

    public static function status($status = "")
    {
        $data = [

            '1' => "ATIVO",
            "0" => "INATIVO",
        ];
        if (!empty($status)) {
            return $data[$status];
        }
        return $data;
    }

    public static function getEmpresasId($parametro = [])
    {
        $result = [];
        if (!empty($parametro)) {
            $empresa = new Empresa();
            $busca = $empresa->all($parametro);
            foreach($busca as  $value){
             $result[$value->id] = $value;
            }
            return $result ;
        }
        $empresa = new Empresa();
        $busca = $empresa->all(['id', 'nome']);
        foreach($busca as $key => $value){
            $result[$value->id] = $value->nome;
            
        }
        return ($result);   
    }

    public static function getEmpresasIdRvenda($parametro = [])
    {
        $result = [];
        
        if (!empty($parametro)) {
            $empresa = new Empresa();
            $busca = $empresa->select($parametro)->where('revenda',true)->get();
            foreach($busca as  $value){
             $result[$value->id] = $value;
            }
            return $result ;
        }

        $empresa = new Empresa();
        $busca = $empresa->select(['id', 'nome'])->where('revenda',true)->get();
        foreach($busca as $key => $value){
            $result[$value->id] = $value->nome;
            
        }
        return ($result);   
    }

    public static function nivel($nivel = "")
    {
        $data = [

            '1' => "USUARIO CONSULTA/UPDATE",
            "0" => "ADMINISTRADOR",
            '2' => "REVENDA MASTER"
        ];
        if (!empty($nivel)) {
            return $data[$nivel];
        }
        return $data;
    }

    public static function nivelForPage()
    {

      $nivel = [
        0 => "adm",
        1 => "user",
        2 => "revenda" 
      ];
      $page = $nivel[Auth::user()->nivel];
      return "/$page/dashboard";
    }

    public static function getStatusBusca($busca)
    {
         $busca = strtoupper($busca);
    }
}
