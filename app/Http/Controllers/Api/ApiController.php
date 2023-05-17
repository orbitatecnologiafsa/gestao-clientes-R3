<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositorio\Api\ApiRepositorio;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $apiRepositorio;

    public function __construct(){
        $this->apiRepositorio = new ApiRepositorio();
    }
    //  public function statusCliente($documento)
    public function statusCliente($documento)
    {

        $cliente = $this->apiRepositorio->clienteStatus($documento);
        return ($cliente->content());

    }
}
