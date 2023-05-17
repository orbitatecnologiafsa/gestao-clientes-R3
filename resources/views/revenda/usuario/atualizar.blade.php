@extends('tamplate.main')
@section('titulo', 'Atualizar usuario - Orbita Tecnologia')
@push('nav')
@include('revenda.partial.nav')
@endpush
@push('sidbar')
@include('revenda.partial.sid-bar')
@endpush
@section('conteudo')
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
               
                <div class="card-body">
                    
                    <h4 class="card-title">Atualizar de Usuário</h4>
                    <p class="card-description">
                        Área de atualização de um novo usuario
                    </p>
                    <form class="forms-sample" action="{{ route('revenda-usuario-atualizar-put',$usuarios->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nome</label>
                            <input type="text" name="nome" value="{{  $usuarios->nome ?? old('nome') }}" class="form-control"
                                id="exampleInputUsername1" placeholder="Nome">
                                @error('nome')
                                <span class="danger text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" name="email" value="{{ old('email') ?? $usuarios->email }}" class="form-control"
                                id="exampleInputEmail1" placeholder="Email">
                                @error('email')
                                <span class="danger text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Empresa</label>
                            <select name="id_empresa" class="form-select" id="">
                                <option>Selecione</option>

                                
                                @foreach ($empresas as $empresa)
                                                @if ($empresa->id == $usuarios->id_empresa || old('id_empresa') == $empresa->id)
                                                    <option value="{{ $usuarios->id_empresa }}" selected>
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
                        <div class="form-group">
                            <label for="">Nivel</label>
                            <select name="nivel" class="form-select" id="">
                                @foreach ($nivel as $key => $value)
                                @if ($key == $usuarios->nivel)
                                    <option value="{{$key}}" {{old('nivel') ?? "selected"}}>{{$value}}</option>
                                   @else
                                   <option value="{{$key}}" {{old('nivel') ? "selected" : ""}}>{{$value}}</option>

                                @endif

                            @endforeach
                            </select>
                            @error('nivel')
                            <span class="danger text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" id="password" value="{{ old('password') }}" name="password" class="form-control"
                                id="exampleInputPassword1" placeholder="Senha">
                                @error('password')
                                <span class="danger text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Comfirme a senha</label>
                            <input type="password" id="password-comfirmation" value="{{ old('password_confirmation')}}" name="password_confirmation"
                                class="form-control" id="exampleInputConfirmPassword1" placeholder="Confirmar senha">
                                @error('password_confirmation')
                                <span class="danger text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div  class="mb-3" style="margin-left: 1px;">
                            <input class="form-check-input" type="checkbox"  onclick="checado(this);" id="senhaShow">
                            <label class="form-check-label" for="senhaShow">Exibir Senha</label>
                        </div>
                        <button type="submit" id="submit-form" class="btn btn-primary me-2">Atualizar</button>

                    </form>
                </div>
            </div>
        
    @endsection
