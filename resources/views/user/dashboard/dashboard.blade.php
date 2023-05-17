@extends('tamplate.main')
@section('titulo', 'Dashboard - Orbita Tecnologia')
@push('nav')
@include('user.partial.nav')
@endpush
@push('sidbar')
@include('user.partial.sid-bar')
@endpush
@section('conteudo')


    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="font-weight-bold mb-0">Orbita Tecnologia Dashboard</h4>
                </div>
                {{-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                        <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="row">
       
        <div class="col-md-3 grid-margin stretch-card">
          
            <div class="card">
                <a class="nav-link" style="color: black" href="{{route('user-cliente-lista') }}">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">clientes</p>
                    <div
                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $contador['total'] }}</h3>
                        <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    {{-- <p class="mb-0 mt-2 text-danger">0.12% <span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
                </div>
            </a>
            </div>
        
        </div>
        
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <a class="nav-link" style="color: green" href="{{route('user-cliente-ativos') }}">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Ativos</p>
                    <div
                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color: green">
                            {{ $contador['ativos'] }}</h3>
                        <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    {{-- <p class="mb-0 mt-2 text-danger">0.47% <span class="text-black ms-1"><small>(30 days)</small></span></p> --}}
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <a class="nav-link" style="color: rgb(255, 123, 35);" href="{{route('user-cliente-bloqueados') }}">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Bloqueados</p>
                    <div
                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color: rgb(255, 123, 35);">
                            {{ $contador['bloqueados'] }}</h3>
                        <i class="ti-lock icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    {{-- <p class="mb-0 mt-2 text-success">64.00%<span class="text-black ms-1"><small>(30 days)</small></span> --}}
                    </p>
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <a class="nav-link" style="color: red;" href="{{route('user-cliente-inativos') }}">

                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Inativos</p>
                    <div
                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="color: red">
                            {{ $contador['inativos'] }}</h3>
                        <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    {{-- <p class="mb-0 mt-2 text-success">23.00%<span class="text-black ms-1"><small>(30 days)</small></span> --}}
                    </p>
                </div>
            </a>
            </div>
        </div>

        {{-- vaL{} --}}
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">MRR</p>
                    <div
                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                            <i class="ti-money icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                            {{ $empresas['qtdValor'] ? number_format($empresas['qtdValor'], 2, ',', '.') : 0 }}
                        </h3>

                    </div>
                    {{-- <p class="mb-0 mt-2 text-success">23.00%<span class="text-black ms-1"><small>(30 days)</small></span> --}}
                    </p>
                </div>
            </div>
        </div>
       
        
    </div>
    @if (isset($grafico))
        <div class="row" id="grafico">

        </div>
    @endif

    @push('javascript')
        <script src="{{ asset('js/dashboard.js') }}"></script>

        <script type="text/javascript">
            function colorize(opaque, hover, ctx) {
                const v = ctx.parsed;
                const c = v < -50 ? '#D60000' :
                    v < 0 ? '#F46300' :
                    v < 50 ? '#0358B6' :
                    '#44DE28';

                const opacity = hover ? 1 - Math.abs(v / 150) - 0.2 : 1 - Math.abs(v / 150);

                return opaque ? c : Utils.transparentize(c, opacity);
            }

            function hoverColorize(ctx) {
                return colorize(false, true, ctx);
            }
            @php
                $divphp = '';
                $chart = '';
            @endphp
            @foreach ($grafico as $key => $value)
                @php
                $divphp .= "
                        <div class='col-lg-12 mt-5 grid-margin grid-margin-lg-0 stretch-card'>
              <div class='card'>
                <div class='card-body'>
                  <h4 class='card-title'>$key</h4>
                  <canvas id='{$key}'></canvas>
                </div>
              </div>
            </div>";
                @endphp
            @endforeach

            @foreach ($grafico as $key => $value)
                @php
                    $chart .= "
                    
                    var ctx = document.getElementById('$key');

                    new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {$value['cidade']},
                        datasets: [{
                        label: 'Clientes',
                        data: {$value['count']},
                        backgroundColor: [
                            'rgba(152.71655913295214, 201.76262585471318, 66.07809958719156)','rgba(125.6728148905614, 71.09370095898515, 219.75000449864882)','rgba(55.58957654256044, 11.938802081074796, 238.29594097223298)','rgba(78.84269715630774, 217.46605434458257, 182.58309133737853)','rgba(68.97411278249704, 76.91823188018512, 188.7077476834505)','rgba(241.2371531500043, 111.75522132741013, 67.89212277896496)','rgba(239.97096648641113, 102.97980603426812, 161.34556743376393)','rgba(197.67587166719983, 143.07473841325944, 189.28854320497717)','rgba(14.99830946234114, 66.92586792918144, 114.35718086107133)','rgba(222.83245238621302, 152.59077360268077, 171.9964913520668)','rgba(111.38717830176961, 157.27809386552474, 200.3396184184215)','rgba(169.3459537855656, 108.05603444220564, 82.54432531068747)','rgba(186.20589574246154, 217.6706520028399, 82.68614759132348)','rgba(111.11232928441238, 210.30721340116673, 14.125296527535646)','rgba(42.7539697432833, 233.1290360052031, 70.49079350591205)','rgba(98.51001730156797, 135.06105754628325, 69.94019909794652)','rgba(9.840991687308943, 213.88933884699406, 79.49779930732612)','rgba(77.11551324370295, 91.69020928114993, 73.37711056063613)','rgba(155.5522135820343, 12.076308079169584, 64.17898388865792)','rgba(198.3589138817174, 128.76402456020838, 32.53274861296304)','rgba(46.40075267425053, 54.95388848315048, 83.73365718824448)','rgba(120.2371235021649, 39.86481633153361, 28.25797973308673)','rgba(182.61655647059644, 152.39215965727382, 73.62111957844064)','rgba(205.3691265106505, 238.46107424643523, 95.1012737643541)','rgba(107.989810182829, 161.64075485132292, 93.11390934851748)','rgba(244.95413688108746, 91.58301318746332, 251.43169963740596)','rgba(41.90316198880582, 22.416273282681527, 237.18108473522366)','rgba(38.80564002279499, 172.9549410739188, 81.06863213569589)','rgba(157.00814933469775, 21.684530685791533, 227.40330995034904)','rgba(41.11256939831449, 37.15233562469007, 103.17171661340444)','rgba(49.48301679402892, 28.561686046328333, 156.38959854753801)','rgba(28.95194358378188, 245.94802061311418, 165.70285626790402)','rgba(212.310618292387, 197.97428169369215, 43.41807667093876)','rgba(73.87259310336219, 134.29881230518154, 162.21279862179586)','rgba(4.054714460996402, 156.76240527527125, 122.54910474965928)','rgba(37.59335063644389, 224.49264449305, 62.03502953451854)','rgba(67.36356316463407, 131.7069973983093, 55.477452084882806)','rgba(246.6094510153671, 237.00856378313054, 143.73325426951325)','rgba(42.29043799950804, 70.26830159805898, 36.48436635421715)','rgba(212.32062463801577, 225.29654434655475, 175.75490572546727)',

                        ],
                        borderColor: [
                            'rgba(152.71655913295214, 201.76262585471318, 66.07809958719156)','rgba(125.6728148905614, 71.09370095898515, 219.75000449864882)','rgba(55.58957654256044, 11.938802081074796, 238.29594097223298)','rgba(78.84269715630774, 217.46605434458257, 182.58309133737853)','rgba(68.97411278249704, 76.91823188018512, 188.7077476834505)','rgba(241.2371531500043, 111.75522132741013, 67.89212277896496)','rgba(239.97096648641113, 102.97980603426812, 161.34556743376393)','rgba(197.67587166719983, 143.07473841325944, 189.28854320497717)','rgba(14.99830946234114, 66.92586792918144, 114.35718086107133)','rgba(222.83245238621302, 152.59077360268077, 171.9964913520668)','rgba(111.38717830176961, 157.27809386552474, 200.3396184184215)','rgba(169.3459537855656, 108.05603444220564, 82.54432531068747)','rgba(186.20589574246154, 217.6706520028399, 82.68614759132348)','rgba(111.11232928441238, 210.30721340116673, 14.125296527535646)','rgba(42.7539697432833, 233.1290360052031, 70.49079350591205)','rgba(98.51001730156797, 135.06105754628325, 69.94019909794652)','rgba(9.840991687308943, 213.88933884699406, 79.49779930732612)','rgba(77.11551324370295, 91.69020928114993, 73.37711056063613)','rgba(155.5522135820343, 12.076308079169584, 64.17898388865792)','rgba(198.3589138817174, 128.76402456020838, 32.53274861296304)','rgba(46.40075267425053, 54.95388848315048, 83.73365718824448)','rgba(120.2371235021649, 39.86481633153361, 28.25797973308673)','rgba(182.61655647059644, 152.39215965727382, 73.62111957844064)','rgba(205.3691265106505, 238.46107424643523, 95.1012737643541)','rgba(107.989810182829, 161.64075485132292, 93.11390934851748)','rgba(244.95413688108746, 91.58301318746332, 251.43169963740596)','rgba(41.90316198880582, 22.416273282681527, 237.18108473522366)','rgba(38.80564002279499, 172.9549410739188, 81.06863213569589)','rgba(157.00814933469775, 21.684530685791533, 227.40330995034904)','rgba(41.11256939831449, 37.15233562469007, 103.17171661340444)','rgba(49.48301679402892, 28.561686046328333, 156.38959854753801)','rgba(28.95194358378188, 245.94802061311418, 165.70285626790402)','rgba(212.310618292387, 197.97428169369215, 43.41807667093876)','rgba(73.87259310336219, 134.29881230518154, 162.21279862179586)','rgba(4.054714460996402, 156.76240527527125, 122.54910474965928)','rgba(37.59335063644389, 224.49264449305, 62.03502953451854)','rgba(67.36356316463407, 131.7069973983093, 55.477452084882806)','rgba(246.6094510153671, 237.00856378313054, 143.73325426951325)','rgba(42.29043799950804, 70.26830159805898, 36.48436635421715)','rgba(212.32062463801577, 225.29654434655475, 175.75490572546727)',

                        ],
                        }]
                    },
                    options: {
                        
                        scales: {
                        y: {
                            beginAtZero: true
                        }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                labels: {
                                    position:'left',
                                    textAlign:'center'
                                }
                            }
                        },
                        responsive:true,
                        animation: {
                        animateScale: true,
                        animateRotate: true
                        }
                      
                    }
                    });

                    ";
                @endphp
            @endforeach

            let div = document.createElement('div');
            div.innerHTML = `<?php echo $divphp; ?>`;
            document.getElementById('grafico').appendChild(div);
            <?php echo $chart; ?>
        </script>
    @endpush
@endsection
