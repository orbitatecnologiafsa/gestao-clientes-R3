@extends('tamplate.main')
@section('titulo', 'Atualizar empresa - Orbita Tecnologia')
@push('nav')
@include('adm.partial.nav')
@endpush
@push('sidbar')
@include('adm.partial.sid-bar')
@endpush
@section('conteudo')
<div class="col-12 grid-margin">
 
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Atualizar Empresa {{ $empresa->nome }}</h4>
            <form class="form-sample" action="{{route('adm-empresa-atualizar-id',$empresa->id)}}" method="POST">
                @csrf
                @method('PUT')
                <p class="card-description">
                    Área de autualizar de empresa
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nome</label>
                            <div class="col-sm-9">
                                <input type="text" name="nome"  value="{{ old('nome') ?? $empresa->nome}}" class="form-control" />
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
                                <input type="text" name="documento" value="{{old('documento') ?? $empresa->documento}}" class="form-control" />
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
                                <input type="text" name="cidade" value="{{ old('cidade') ?? $empresa->cidade}}" class="form-control" />
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
                                <input type="text" name="estado" value="{{ old('estado') ?? $empresa->estado}}" class="form-control" />
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
                            <label class="col-sm-3 col-form-label">Revenda</label>
                            <div class="col-sm-9">
                                <select name="revenda" class="form-control">
                                    @foreach ($opcao as $key => $value)
                                        @if (old('revenda') == $key || $empresa->revenda == $key)
                                            <option value="{{ $key++ }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $key++ }}">{{ $value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('revenda')
                                    <span class="danger text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Responsavel</label>
                            <div class="col-sm-9">
                                <input type="text" name="responsavel" value="{{old('responsavel') ?? $empresa->responsavel}}" class="form-control" />
                                @error('responsavel')
                                <span class="danger text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                </div>
              

                <button type="submit" class="btn btn-primary me-2 btn-rounded">Atualizar</button>
                </form>
                
            </div>
        </div>
    </div>
@endsection