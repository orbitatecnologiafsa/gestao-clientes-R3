@extends('tamplate.main')
@section('titulo', 'Detalhes usuario - Orbita Tecnologia')
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
            <h4 class="card-title">Detalhes do Usuario</h4>
            <p class="card-description">
                Área de detalhes do usuario
            </p>
            <div class="card-text mt-3">
                Nome : {{$usuarios->nome}}
            </div>
            <div class="card-text mt-3">
                Email : {{$usuarios->email}}
            </div>
    

            <div class="card-text mt-3">
               Nivel: {{ $nivel[$usuarios->nivel]}}
            </div>
            <div class="card-text mt-3">
                Empresa: {{ $empresas[$usuarios->id_empresa] }}
             </div>
             
             <div class="card-text mt-3">
                Bloqueado: {{ $opcao[$usuarios->bloqueado]}}
             </div>
    
            <div class="card-text mt-3 card-description">
                Data de Cadastro: {{ $usuarios->created_at }}
            </div>
            <div class="card-text  card-description mb-3">
                Data de Ultima atualização : {{ $usuarios->updated_at }}
            </div>
            <a class="btn-warning btn me-2 btn-rounded" href="javascript:history.back()">Voltar</a>
        </div>
    </div>
</div>

@endsection

