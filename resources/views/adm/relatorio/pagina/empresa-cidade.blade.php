@extends('tamplate.main')
@section('titulo', 'Empresa pór cidade - Orbita Tecnologia')
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
                <h4 class="card-title">Gerar Relatorio cliente por cidade</h4>
                @include('tamplate.errorOrSuccess')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <form action="{{ route('adm-relatorio-cidade-empresa') }}" method="get">
                                <label class="col-sm-3 col-form-label">Selecione a empresa</label>
                                <div class="col-sm-9">

                                    <select name="busca" class="form-control">
                                        <option selected>Selecione</option>
                                        @foreach ($empresas as $empresa)
                                            @if (old('busca'))
                                                <option value="{{ $empresa->id }}"
                                                    {{ old('busca') == $empresa->id ? 'selected' : '' }}>
                                                    {{ $empresa->nome }}</option>
                                            @endif
                                            <option value="{{ $empresa->id }}">
                                                {{ $empresa->nome }}</option>
                                        @endforeach

                                        @error('busca')
                                            <span class="danger text-danger">{{ $message }}</span>
                                        @enderror

                                    </select>

                                </div>
                                <div class="form-group row mt-5">
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary me-2 btn-rounded ">Gerar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
