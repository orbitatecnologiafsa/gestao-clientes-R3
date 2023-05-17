@extends('tamplate.main')
@section('titulo', 'Login - Orbita Tecnologia')
@section('conteudo')
<div class="row flex-grow">

        




    <div class="col-lg-6 d-flex align-items-center justify-content-center">

        <div class="auth-form-transparent text-left p-3">
            {{-- <div class="brand-logo">
                    <img src="{{ asset('images/logo.svg')}}" alt="logo">
                </div> --}}
            <div class="font-weight-light" style=" margin-bottom:30px;">
                @include('tamplate.errorOrSuccess')
            </div>

            <h4>Bem vindo!</h4>

            <h6 class="font-weight-light">Estamos felizes em ter voçê conosco!</h6>
            <form action="{{ route('login-post') }}" method="post" class="pt-3">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail">E-mail</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="ti-user text-primary"></i>
                            </span>
                        </div>
                        <input type="email" name="email" class="form-control form-control-lg border-left-0"
                            id="exampleInputEmail" placeholder="E-mail">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Senha</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="ti-lock text-primary"></i>
                            </span>
                        </div>
                        <input type="password" id="password" name="password" class="form-control form-control-lg border-left-0"
                            id="exampleInputPassword" placeholder="Senha">
                    </div>
                </div>
                <div style="margin-left: 1px;">
                    <input class="form-check-input" type="checkbox"  onclick="checado(this);" id="senhaShow">
                    <label class="form-check-label" for="senhaShow">Exibir Senha</label>
                </div>
                <div class="my-3">
                    <button type="submit"
                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  id="submit-form" onclick="submit(this);">ENTRAR</button>
                </div>

                <div class="text-center mt-4 font-weight-light">
                    Esqueceu a senha ou email? <a href="register-2.html" class="text-primary"> Contate o suporte </a>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-6 login-half-bg d-flex flex-row">
        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy;
            {{ date('Y') }} All
            rights reserved.</p>
    </div>

    <!-- content-wrapper ends -->
</div>
@endsection