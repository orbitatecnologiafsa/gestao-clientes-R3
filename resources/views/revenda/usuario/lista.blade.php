@extends('tamplate.main')
@section('titulo', 'Lista usuario - Orbita Tecnologia')
@push('nav')
@include('revenda.partial.nav')
@endpush
@push('sidbar')
@include('revenda.partial.sid-bar')
@endpush
@section('conteudo')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de Usuarios</h4>
                <p class="card-description">
                   Lista de Usuarios cadastrados
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
                                    Email
                                </th>
                                <th>
                                    Empresa
                                </th>
                                <th>
                                    Nivel
                                </th>
                                <th>
                                    Bloqueado
                                </th>
                                <th class="text-center">
                                    Opções
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>
                                        {{$usuario->id}}
                                    </td>
                                    <td>
                                       {{$usuario->nome}}
                                    </td>
                                    <td>
                                        {{$usuario->email}}
                                    </td>
                                    <td>
                                        {{ isset($empresas[$usuario->id_empresa]) ? $empresas[$usuario->id_empresa] : $usuario->id_empresa }}
                                    </td>
                                    <td>
                                        {{ isset($nivel[$usuario->nivel]) ? $nivel[$usuario->nivel] : $usuario->bloqueado }}
                                    </td>
                                    <td>
                                        {{ isset($bloqueio[$usuario->bloqueado]) ? $bloqueio[$usuario->bloqueado] : $usuario->bloqueado }}
                                    </td>
                                    <td>
                                        <a href="{{ route('revenda-usuario-atualizar',$usuario->id)}}" class="btn btn-primary">Atualizar</a>
                                        <a href="{{ route('revenda-usuario-detalhes',$usuario->id)}}" class="btn btn-info">Detalhes</a>
                                    </td>
                                </tr>
                            @endforeach
                              
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    {!! $usuarios->links() !!}
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
