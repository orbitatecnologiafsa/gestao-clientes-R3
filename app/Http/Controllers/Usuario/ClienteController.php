<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\ClienteRequest;
use App\Repositorio\Usuario\ClienteRepositorio;
use App\Repositorio\Util\UtilRepositorio;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $clienteRepositorio;
    protected $path;

    public function __construct()
    {
        
        $this->clienteRepositorio = new ClienteRepositorio();
        $this->path = 'user.';
    }


    protected function limparBusca($busca = 'cliente'){
        if(!empty( session()->get($busca) ) ){
            session()->put($busca,'');
        }
    }
    public function lista()
    {
       
        return view($this->path.'cliente.lista', ['titulo' => "Lista de Clientes", 'clientes' => $this->clienteRepositorio->lista(), 'status' => UtilRepositorio::status(), 'opcao' => UtilRepositorio::opcoes(),'empresas'=>UtilRepositorio::getEmpresasId(['id','nome'])]);
    }

    public function ativos()
    { 
        
        return view($this->path.'cliente.lista', ['titulo' => "Lista de Clientes Ativos", 'clientes' => $this->clienteRepositorio->ativos(), 'status' => UtilRepositorio::status(), 'opcao' => UtilRepositorio::opcoes(),'empresas'=>UtilRepositorio::getEmpresasId(['id','nome'])]);
    }

    public function inativos()
    {  
        return view($this->path.'cliente.lista', ['titulo' => "Lista de Clientes Inativos", 'clientes' => $this->clienteRepositorio->inativos(), 'status' => UtilRepositorio::status(), 'opcao' => UtilRepositorio::opcoes(),'empresas'=>UtilRepositorio::getEmpresasId(['id','nome'])]);
    }

    public function bloqueados()
    {
        
        return view($this->path.'cliente.lista', ['titulo' => "Lista de Clientes bloqueados", 'clientes' => $this->clienteRepositorio->bloqueados(), 'status' => UtilRepositorio::status(), 'opcao' => UtilRepositorio::opcoes(),'empresas'=>UtilRepositorio::getEmpresasId(['id','nome'])]);
    }

    public function atualizarId($id)
    {
        
       
        if (!empty($busca = $this->clienteRepositorio->detalhes($id))) {
            
            return view($this->path.'cliente.atualizar', ['cliente' => $busca,'status' => UtilRepositorio::status()], ['empresas' =>  UtilRepositorio::getEmpresasId(['id','nome']),'opcao' => UtilRepositorio::opcoes()]);
        }
        return redirect()->back()->with('msg-error',"O cliente com essse ID {$id} não foi encontrado :(");   
    }

    public function atualizarPut(ClienteRequest $cliente, $id)
    {
        
        if($this->clienteRepositorio->atualizacao($cliente->all(),$id)){
            return redirect()->back()->with('msg-success','Cliente atualizado com sucesso!');
        }
        return redirect()->back()->with('msg-error','Não foi possivel atualizar!');

       
    }

    public function detalhesId($id)
    {
       
        if (!empty($busca = $this->clienteRepositorio->detalhes($id))) {
            return view($this->path.'cliente.detalhes', ['cliente' => $busca,'status' => UtilRepositorio::status()], ['empresas' =>  UtilRepositorio::getEmpresasId(),'opcao' => UtilRepositorio::opcoes()]);
        }
        return redirect()->back()->with('msg-error',"O cliente com essse ID {$id} não foi encontrado :(");
    }

    public function cadastrar()
    {
        
        return view($this->path.'cliente.criar', ['opcao' => UtilRepositorio::opcoes(), 'status' => UtilRepositorio::status()], ['empresas' =>  UtilRepositorio::getEmpresasId(['id','nome'])]);
    }
    public function buscaCliente(Request $cliente)
    {
        
        $clienteBusca = $cliente->all();
         
        if(isset($clienteBusca['cliente'])){
            session()->put('cliente',$clienteBusca);
        }
        if(empty($clienteBusca['cliente']) && empty(session()->get('cliente')))
        {
            $this->limparBusca();
            return redirect()->back()->with('msg-error','Insira nome ou cpf');
        }
        if(empty($clienteBusca['cliente'])){
            $clienteBusca = session()->get('cliente');
        }
       
     
        if(!empty($busca = $this->clienteRepositorio->buscaCliente($clienteBusca) ))
        {  
            return view($this->path.'cliente.lista', ['titulo' => "Resultados", 'clientes' => $busca, 'status' => UtilRepositorio::status(), 'opcao' => UtilRepositorio::opcoes(),'empresas'=>UtilRepositorio::getEmpresasId(['id','nome'])]);
        }
        $this->limparBusca();
        
        return redirect()->to(route('user-cliente-lista'))->with('msg-error','Cliente não encontrado');

    }

   

    public function deletar($id)
    {
        
        return view($this->path.'cliente.deletar');
    }

    public function deleteId($id)
    {
       
        return view('');
    }

    public function deletarId()
    {
        
    }

   
}
