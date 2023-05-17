@extends('tamplate.main')
@section('titulo', 'Detalhes log - Orbita Tecnologia')
@push('nav')
@include('adm.partial.nav')
@endpush
@push('sidbar')
@include('adm.partial.sid-bar')
@endpush
@section('conteudo')


    <div class="col-12 grid-margin">
        @include('tamplate.errorOrSuccess')
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detalhes do log </h4>
                <p class="card-description">
                    Área de detalhes de log
                </p>
                <div class="card-text mt-3">
                    Id responsavél : {{ $log->id_responsavel }}
                </div>
                <div class="card-text mt-3">
                    Responsavel : {{ $log->nome_responsavel }}
                </div>
                <div class="card-text mt-3">
                    Empresa : {{ $empresa[$log->empresa]->nome }}
                </div>

                <div class="card-text mt-3">
                    Metodo: {{ $log->metodo }}
                </div>
                <div class="card-text mt-3">
                    Id cliente : {{ $log->id_cliente }}
                </div>
                <div class="card-text mt-3 ">
                    Nome cliente : {{ $log->nome_cliente }}
                </div>
                <div class="card-text mt-3 ">
                    Documento cpf/cnpj : {{ $log->documento_cliente }}
                </div>
                <div class="card-text mt-3 card-description">
                    Data de Cadastro: {{ $log->created_at }}
                </div>
                <div class="card-text  card-description mb-3">
                    Data de Ultima atualização : {{ $log->updated_at }}
                </div>
                <a class="btn-warning btn me-2 btn-rounded" href="javascript:history.back()">Voltar</a>
            </div>
        </div>
    </div>

@endsection
