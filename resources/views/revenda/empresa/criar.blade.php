@extends('tamplate.main')
@section('titulo', 'Cadastrar empresa - Orbita Tecnologia')
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
                <h4 class="card-title">Cadastrar Empresa</h4>
                @include('tamplate.errorOrSuccess')
                <form class="form-sample" method="post" action="{{ route('revenda-empresa-cadastro-post') }}">
                    @csrf
                    <p class="card-description">
                        Área de cadastro de empresa
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nome</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nome" value="{{ old('nome') }}" class="form-control" />
                                    @error('nome')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Documento cnpj/cpf</label>
                                <div class="col-sm-9">
                                    <input type="text" name="documento" value="{{ old('documento') }}"
                                        class="form-control" />
                                    @error('documento')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Cidade</label>
                                <div class="col-sm-9">
                                    <input type="text" name="cidade" value="{{ old('documento') }}"
                                        class="form-control" />
                                    @error('cidade')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Estado</label>
                                <div class="col-sm-9">
                                    <input type="text" name="estado" value="{{ old('estado') }}" class="form-control" />
                                    @error('estado')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Responsavel</label>
                                <div class="col-sm-9">
                                    <input type="text" name="responsavel" value="{{ old('responsavel') }}"
                                        class="form-control" />
                                    @error('responsavel')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Revenda</label>
                                <div class="col-sm-9">
                                    <select name="revenda" class="form-control">
                                        <option value="1" selected>{{ $opcao[1] }}</option>
                                    </select>
                                    @error('revenda')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <button type="submit" class="btn btn-primary me-2 btn-rounded">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
