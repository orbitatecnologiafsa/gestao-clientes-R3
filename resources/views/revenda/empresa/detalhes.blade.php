@extends('tamplate.main')
@section('titulo', 'Detalhes empresa - Orbita Tecnologia')
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
                <h4 class="card-title">Detalhes da Empresa</h4>
                <p class="card-description">
                    Área de detalhes da empresa
                </p>
                <div class="card-text mt-3">
                    Nome : {{ $empresa->nome }}
                </div>
                <div class="card-text mt-3">
                    Responsavel : {{ $empresa->responsavel }}
                </div>

                <div class="card-text mt-3">
                    Revenda: {{ $opcao[$empresa->revenda ] }}
                 </div>

                <div class="card-text mt-3">
                    Documento cnpj/cpf: {{ $empresa->documento }}
                </div>
                <div class="card-text mt-3">
                    Cidade : {{ $empresa->cidade }}
                </div>
                <div class="card-text mt-3 ">
                    Estado : {{ $empresa->estado }}
                </div>
                <div class="card-text mt-3 card-description">
                    Data de Cadastro: {{ $empresa->created_at }}
                </div>
                <div class="card-text  card-description mb-3">
                    Data de Ultima atualização : {{ $empresa->updated_at }}
                </div>
                <a class="btn-warning btn me-2 btn-rounded" href="javascript:history.back()">Voltar</a>
                <a href="{{ route('revenda-empresa-atualizar', $empresa->id) }}"
                    class="btn-primary btn me-2 btn-rounded">Atualizar</a>

                <a 
                    onclick="event.preventDefault(); document.getElementById('frm-del-empresa').submit();"
                    class="btn-danger btn me-2 btn-rounded">Deletar</a>
                    <form id="frm-del-empresa" action="{{ route('revenda-empresa-deletar-id', $empresa->id) }}" method="post" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
            </div>
        </div>
    </div>

@endsection
