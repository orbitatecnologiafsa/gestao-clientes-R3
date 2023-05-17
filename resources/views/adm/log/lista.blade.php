@extends('tamplate.main')
@section('titulo', 'Lista - Orbita Tecnologia')
@push('nav')
@include('adm.partial.nav')
@endpush
@push('sidbar')
@include('adm.partial.sid-bar')
@endpush
@section('conteudo')

    @if (!empty($logs))
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buscar Log por data ou nome</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <form class="form-sample" action="{{ route('adm-busca-data-log') }}" method="get">
                                    <label class="col-sm-3 col-form-label">Data</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="data" value="{{ old('data') }}"
                                            class="form-control" />
                                        @error('data')
                                            <span class="danger text-danger">{{ $message }}</span>
                                        @enderror
                                        <button type="submit" class="btn btn-primary me-2 mt-2 btn-rounded">Buscar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <form class="form-sample" action="{{ route('adm-busca-nome-log') }}" method="get">
                                    <label class="col-sm-3 col-form-label">Nome</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nome" value="{{ old('nome') }}"
                                            class="form-control" />
                                        @error('nome')
                                            <span class="danger text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2 mt-2 btn-rounded">Buscar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a class="btn-danger btn me-2 btn-rounded" href="{{ route('adm-lista-log') }}">Atualizar pagina</a>

                    


                </div>
            </div>
        </div>
    @endif
    <div class="col-lg-12 grid-margin stretch-card">


        <div class="card">
            @include('tamplate.errorOrSuccess')
            <div class="card-body">
                <h4 class="card-title">Lista de Logs</h4>
                <p class="card-description">
                    Lista de Logs
                </p>
                @if (!empty($logs))
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Responsavel
                                    </th>
                                    <th>
                                        Empresa
                                    </th>
                                    <th>
                                        Metodo
                                    </th>
                                    <th class="text-center">
                                        Opções
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>
                                            {{ $log->id }}
                                        </td>
                                        <td>
                                            {{ $log->nome_responsavel }}
                                        </td>
                                        <td>
                                            {{ $empresa[$log->empresa]->nome }}
                                        </td>
                                        <td>
                                            {{ $log->metodo }}
                                        </td>

                                        <td>
                                            <a href="{{ route('adm-detalhes-log', $log->id) }}"
                                                class="btn btn-info">Detalhes</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        {!! $logs->links() !!}
                    </div>
                @else
                    <h4 class="card-title">Não tem nada aqui!</h4>
                @endif

            </div>
        </div>
    </div>
    </div>
@endsection
