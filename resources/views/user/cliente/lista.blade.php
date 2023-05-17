@extends('tamplate.main')
@section('titulo', 'Lista cliente - Orbita Tecnologia')
@push('nav')
@include('user.partial.nav')
@endpush
@push('sidbar')
@include('user.partial.sid-bar')
@endpush
@section('conteudo')
@if(!empty($clientes))

<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Busca</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Buscar cliente cnpj/nome</label>
                        <div class="col-sm-9">
                            <form class="form-sample" action="{{ route('user-cliente-busca')}}" method="get">
                                <input type="text" name="cliente" value="{{ request()->input('cliente')}}" class="form-control" />
                                    @error('cliente')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary me-2 mt-3 btn-rounded">Buscar</button>
                            </form>
                        
                        </div>
                    </div>
                </div>
                

            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <div class="col-sm-9">
                        <a type="submit" href="{{route('user-cliente-lista')}}" class="btn btn-primary   btn-rounded">Atualizar a lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
  

    <div class="col-lg-12 grid-margin stretch-card">


        <div class="card">
            <div class="card-body">
              
                <h4 class="card-title">{{ $titulo  }}</h4>
                <p class="card-description">

                </p>
                @if (!empty($clientes))
                    <div class="table-responsive pt-3  ">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    
                                    <th>
                                        Nome
                                    </th>
                                    
                                    <th>
                                        Bloqueado
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Cidade
                                    </th>
                                    <th>
                                        Valor
                                    </th>
                                   
                                    <th class="text-center">
                                        Opções
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($clientes as $cliente)
                                    <tr>
                                        
                                        <td class="text-center">
                                            {{ $cliente->nome }}
                                        </td>
                                        
                                        <td>
                                            {{ isset($opcao[$cliente->bloqueado]) ? $opcao[$cliente->bloqueado] : $cliente->bloqueado }}
                                        </td>
                                        <td>
                                            {{ isset($status[$cliente->status]) ? $status[$cliente->status] : $cliente->status }}
                                        </td>
                                        <td>
                                            {{ $cliente->cidade }}
                                        </td>
                                        <td>
                                            {{  number_format($cliente->valor,2,',','.')  }}
                                        </td>
                                        <td>
                                            <a href="{{ route('user-cliente-atualizar-id', $cliente->id) }}"
                                                class="btn btn-primary">Atualizar</a>
                                            <a href="{{ route('user-cliente-detalhes-id', $cliente->id) }}"
                                                class="btn btn-info">Detalhes</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        {!! $clientes->links() !!}
                    </div>
                @else
                    <div class="text-center">
                        Não tem nada aqui!
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>


@endsection
