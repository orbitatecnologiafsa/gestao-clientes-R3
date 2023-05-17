@extends('tamplate.main')
@section('titulo', 'Cadastrar Cliente - Orbita Tecnologia')
@push('nav')
@include('revenda.partial.nav')
@endpush
@push('sidbar')
@include('revenda.partial.sid-bar')
@endpush
@section('conteudo')


    <div class="col-12 grid-margin">


        @include('tamplate.errorOrSuccess')
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Cadastrar Cliente</h4>

                <form class="form-sample" action="{{ route('revenda-cliente-cadastro-post') }}" method="post">
                    @csrf
                    <p class="card-description">
                        Aréa de cadastro
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
                                <label class="col-sm-3 col-form-label">Valor R$</label>
                                <div class="col-sm-9">
                                    <input type="text" id="money-ct" name="valor" value="{{ old('valor') }}" class="form-control" />
                                    @error('valor')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Cidade</label>
                                <div class="col-sm-9">
                                    <input type="text" name="cidade" value="{{ old('cidade') }}" class="form-control" />
                                    @error('cidade')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control">

                                        <option value="{{old('status') ?? 1}}">ATIVO</option>
                                       
                                        {{-- @foreach ($status as $key => $value)
                                       
                                        @if(old('status') == $key)
                                        <option value="{{ $key }}" {{ $key == old('status') ? 'selected' : ""}}>{{$value}}</option>
                                       
                                        @endif
                                        
                                        

                                       
                                        @endforeach --}}

                                        

                                    </select>
                                    @error('status')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bloqueado</label>
                                <div class="col-sm-9">
                                    <select name="bloqueado" class="form-control">
                                        @foreach ($opcao as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('bloqueado') == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('bloqueado')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Empresa</label>
                                <div class="col-sm-9">
                                    <select name="id_empresa" class="form-control">
                                        <option selected>Selecione</option>

                                        @foreach ($empresas as $empresa)
                                        @if(old('id_empresa'))
                                        <option value="{{ $empresa->id }}"
                                            {{ old('id_empresa') == $empresa->id ? 'selected' : '' }}>
                                            {{ $empresa->nome }}</option>
                                        @endif
                                        <option value="{{ $empresa->id }}"
                                             >
                                            {{ $empresa->nome }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_empresa')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Data de Venciemento</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="data_vencimento" value="{{ old('data_vencimento') }}"
                                        type="date" placeholder="dd/mm/yyyy" />
                                    @error('data_vencimento')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">



                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Data de Bloqueio</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="data_bloqueio" value="{{ old('data_bloqueio') }}"
                                        type="date" placeholder="dd/mm/yyyy" />
                                    @error('data_bloqueio')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Dias de Carencia</label>
                                <div class="col-sm-9">
                                    <input type="text" name="qtd_carencia" value="{{ old('qtd_carencia') }}"
                                        class="form-control" />
                                    @error('qtd_carencia')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>



                    {{-- <p class="card-description">
                        Address
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address 1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address 2</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Documento</label>
                                <div class="col-sm-9">
                                    <input type="text" name="documento" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Cidade</label>
                                <div class="col-sm-9">
                                    <input type="text" name="cidade" class="form-control" />
                                </div>
                            </div>
                        </div>

                    </div> --}}
                  
                    <button type="submit" class="btn btn-primary me-2 btn-rounded">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    @push('javascript')
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/mascara.js')}}"></script>

@endpush
@endsection
