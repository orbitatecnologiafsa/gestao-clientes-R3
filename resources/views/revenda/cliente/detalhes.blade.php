@extends('tamplate.main')
@section('titulo', 'Detalhes do cliente - Orbita Tecnologia')
@push('nav')
@include('revenda.partial.nav')
@endpush
@push('sidbar')
@include('revenda.partial.sid-bar')
@endpush
@section('conteudo')



    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detalhes do Cliente</h4>
                <p class="card-description">
                    Área de detalhes do cliente </p>

                <div class="card-text mt-3">
                    Nome : {{ $cliente->nome }}
                </div>
                <div class="card-text mt-3">
                    Documento : {{ $cliente->documento }}
                </div>

                <div class="card-text mt-3">
                    Empresa : {{$empresas[$cliente->id_empresa]}}
                    
                </div>
                <div class="card-text mt-3">
                    Cidade : {{ $cliente->cidade }}
                </div>
                <div class="card-text mt-3">
                    Status : @foreach ($status as $key => $value)
                        @if ($key == $cliente->status)
                            {{ $value }}
                        @endif
                    @endforeach
                </div>
                <div class="card-text mt-3">
                    Bloqueado: 
                    @foreach ($opcao as $key => $value)
                        @if ($key == $cliente->bloqueado)
                            {{ $value }}
                        @endif
                    @endforeach
                </div>
                <div class="card-text mt-3">
                    Valor : {{ number_format($cliente->valor,2,',','.') }}
                </div>
                <div class="card-text mt-3">
                    Data de Vencimento : {{ $cliente->data_vencimento }}
                </div>

                <div class="card-text mt-3">
                    Data de bloqueio : {{ $cliente->data_bloqueio }}
                </div>
                <div class="card-text mt-3">
                    Qtd. de carencia : {{ $cliente->qtd_carencia }}
                </div>

                <div class="card-text mt-3 card-description">
                    Data de Cadastro: {{ $cliente->created_at }}
                </div>
                <div class="card-text  card-description">
                    Data de Ultima atualização : {{ $cliente->updated_at }}
                </div>

                <a href="{{ route('revenda-cliente-atualizar-id',$cliente->id)}}" class="btn-primary btn me-2 btn-rounded">Atualizar</a>
                <a href="" class="btn-danger btn me-2 btn-rounded">Deletar</a>
            </div>
        </div>
    </div>
@endsection
