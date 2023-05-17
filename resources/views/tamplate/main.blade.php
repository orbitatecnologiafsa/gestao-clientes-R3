<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('titulo')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <!-- endinject -->

</head>

<body>


    @if (auth()->hasUser())
        {{-- usuario logado --}}
        <div class="container-scroller">
            @stack('nav')
            <div class="container-fluid page-body-wrapper">
                @stack('sidbar')
                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('conteudo')
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- usuario não logado --}}
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                    @yield('conteudo')
                </div>
            </div>
        </div>
    @endif





    <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/base/bootstrap.min.js.map') }}"></script>

    <script src="{{ asset('vendors/chart.js/chart-new.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="{{ asset('js/senha/exibir-senha.js') }}"></script>
    <script src="{{ asset('js/redirect.js')}}"></script>
    @if (Session::has('msg-error'))
        <script>
            function error() {
                var error =  "{!! Session::get('msg-error') !!}" 
               return swal("Ops,Ouve um erro!", error, "error");
            }
            setTimeout(function() { 
            // o teu código mouse hover aqui
            error();
        }, 400);
            
        </script>
    @endif
    @if (Session::has('msg-success'))
        <script>
            function success() {
                var success =  "{!! Session::get('msg-success') !!}" 
               return swal("Tudo ok!", success, "success");
            }
            setTimeout(function() { 
            // o teu código mouse hover aqui
            success();
        }, 400)
        </script>
    @endif
    @stack('javascript')
</body>
