@extends('tamplate.main')
@section('titulo', 'Lista - Orbita Tecnologia')
@push('nav')
    @include('revenda.partial.nav')
@endpush
@push('sidbar')
    @include('revenda.partial.sid-bar')
@endpush
@section('conteudo')
    @if (!empty($clientes))


        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Busca</h4>
                <div class="row">

                    <form class="form-sample" action="{{ route('revenda-cliente-busca-empresa') }}" method="get">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Buscar Empresa</label>
                                <div class="col-sm-9">

                                    <select name="empresa"  value="{{ request()->input('empresa')}}" class="form-control" id="">
                                        @foreach ($empresas as $emp)
                                            <option value="{{ $emp->id }}" {{  request()->input('empresa') == $emp->id ? "selected" : ''}}>{{ $emp->nome }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit"
                                        class="btn btn-primary me-2 mt-3 mb-3 btn-rounded">Buscar</button>

                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Buscar cliente cnpj/nome</label>
                            <div class="col-sm-9">
                                <form class="form-sample" action="{{ route('revenda-cliente-busca') }}" method="get">
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
                            <a type="submit" href="{{ route('revenda-cliente-lista') }}"
                                class="btn btn-primary   btn-rounded">Atualizar a lista</a>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    @endif


    <div class="col-lg-12 grid-margin stretch-card">


        <div class="card">
            <div class="card-body">

                <h4 class="card-title">{{ $titulo }}</h4>
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
                                            {{ number_format($cliente->valor, 2, ',', '.') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('revenda-cliente-atualizar-id', $cliente->id) }}"
                                                class="btn btn-primary">Atualizar</a>
                                            <a href="{{ route('revenda-cliente-detalhes-id', $cliente->id) }}"
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
