<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Repositorio\Adm\DashboardRepositorio;
use App\Repositorio\Adm\GraficoRepositorio;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardRepositorio;
    protected $graficoRepositorio;
    public function __construct()
    {
        $this->dashboardRepositorio = new DashboardRepositorio();
        $this->graficoRepositorio = new GraficoRepositorio();
    }

    public function index()
    {

       
        // dd($this->dashboardRepositorio->clientesPorEmpresa()['empresas'][1]->nome);
        return view(
            'adm.dashboard.dashboard',
            [
                'contador' => $this->dashboardRepositorio->contadorClientes(),
                'empresas' => $this->dashboardRepositorio->clientesPorEmpresa(),
                'grafico' => $this->graficoRepositorio->graficoClienteCidade()
            ]
        );
    }
}
