<?php

namespace App\Http\Controllers\Revenda;

use App\Http\Controllers\Controller;
use App\Repositorio\Revenda\DashboardRepositorio;
use App\Repositorio\Revenda\GraficoRepositorio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardRepositorio;
    protected $graficoRepositorio;
    protected $path;
    public function __construct()
    {
        $this->dashboardRepositorio = new DashboardRepositorio();
        $this->graficoRepositorio = new GraficoRepositorio();
        $this->path = 'revenda.';
    }

    public function index()
    {

       
        // dd($this->dashboardRepositorio->clientesPorEmpresa()['empresas'][1]->nome);
        return view(
          $this->path.'dashboard.dashboard',
            [
                'contador' => $this->dashboardRepositorio->contadorClientes(),
                'empresas' => $this->dashboardRepositorio->clientesPorEmpresa(),
                'grafico' => $this->graficoRepositorio->graficoClienteCidade()
            ]
        );
    }
}
