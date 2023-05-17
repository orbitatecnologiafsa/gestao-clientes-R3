@extends('tamplate.main')
@section('titulo', 'Atualizar cliente - Orbita Tecnologia')
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
                <h4 class="card-title">Atualizar Cliente</h4>

                <form class="form-sample" action="{{ route('revenda-cliente-atualizar-put', $cliente->id) }}" method="post">
                    @csrf
                    @method('put')
                    <p class="card-description">
                        Aréa de atualização
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nome</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nome" value="{{ old('nome') ?? $cliente->nome }}"
                                        class="form-control" />
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
                                    <input type="text" name="documento"
                                        value="{{ old('documento') ?? $cliente->documento }}" class="form-control" />
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
                                    <input type="text"  id="money-at" name="valor"  value="{{ old('valor') ?? $cliente->valor }}"
                                        class="form-control" />
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
                                    <input type="text" name="cidade" value="{{ old('cidade') ?? $cliente->cidade }}"
                                        class="form-control" />
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
                                        

                                        @foreach ($status as $key => $value)
                                            @if ($key == $cliente->status)
                                                <option value="{{$key}}" {{old('status') ?? "selected"}}>{{$value}}</option>
                                               @else
                                               <option value="{{$key}}" {{old('status') ? "selected" : ""}}>{{$value}}</option>

                                            @endif

                                        @endforeach



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
                                            @if (old('bloqueado') == $key || $cliente->bloqueado == $key)
                                                <option value="{{ $key++ }}" selected>{{ $value }}</option>
                                            @else
                                                <option value="{{ $key++ }}">{{ $value }}</option>
                                            @endif
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
                                            <option>Selecione</option>

                                            @foreach ($empresas as $empresa)
                                                @if ($empresa->id == $cliente->id_empresa || old('id_empresa') == $empresa->id)
                                                    <option value="{{ $cliente->id_empresa }}" selected>
                                                        {{ $empresa->nome }}</option>
                                                @else
                                                    <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                                                @endif
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
                                    <input class="form-control" name="data_vencimento"
                                        value="{{ old('data_vencimento') ?? $cliente->data_vencimento }}" type="date"
                                        placeholder="dd/mm/yyyy" />
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
                                    <input class="form-control" name="data_bloqueio"
                                        value="{{ old('data_bloqueio') ?? $cliente->data_bloqueio }}" type="date"
                                        placeholder="dd/mm/yyyy" />
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
                                    <input type="text" name="qtd_carencia"
                                        value="{{ old('qtd_carencia') ?? $cliente->qtd_carencia }}"
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
                  
                    <button type="submit" class="btn btn-primary me-2 btn-rounded">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
    @push('javascript')
        <script src="{{asset('js/jquery.mask.js')}}"></script>
        <script src="{{asset('js/mascara.js')}}"></script>

    @endpush
@endsection
