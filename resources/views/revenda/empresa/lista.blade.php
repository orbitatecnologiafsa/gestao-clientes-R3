@extends('tamplate.main')
@section('titulo', 'Detalhes empresa - Orbita Tecnologia')
@push('nav')
@include('revenda.partial.nav')
@endpush
@push('sidbar')
@include('revenda.partial.sid-bar')
@endpush
@section('conteudo')




    <div class="col-lg-12 grid-margin stretch-card">
        @include('tamplate.errorOrSuccess')
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de empresas</h4>
                <p class="card-description">
                   Lista de empresas cadastradas
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Nome
                                </th>
                                <th>
                                    Documento
                                </th>
                                <th>
                                    Cidade
                                </th>
                                <th>
                                    Responsavel
                                </th>
                                <th>
                                    Revenda
                                </th>
                                <th class="text-center">
                                    Opções
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($empresas as $empresa)
                                <tr>
                                    <td>
                                        {{$empresa->id}}
                                    </td>
                                    <td>
                                       {{$empresa->nome}}
                                    </td>
                                    <td>
                                        {{$empresa->documento}}
                                    </td>
                                    <td>
                                        {{$empresa->cidade}}
                                    </td>
                                    <td>
                                        {{$empresa->responsavel}}
                                    </td>
                                    <td>
                                        {{$opcao[$empresa->revenda]}}
                                    </td>
                                    <td>
                                        <a href="{{ route('revenda-empresa-atualizar',$empresa->id)}}" class="btn btn-primary">Atualizar</a>
                                        <a href="{{ route('revenda-empresa-detalhes',$empresa->id)}}" class="btn btn-info">Detalhes</a>
                                    </td>
                                </tr>
                            @endforeach
                              
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    {!! $empresas->links() !!}
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
