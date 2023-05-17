<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatorio de Clientes</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            text-transform: uppercase;
        }

        .header,
        .main,
        .footer {
            max-width: 1300px;
            margin: auto
        }

        .header {
            background-color: aqua;
            padding: 30px;
            text-align: center;
            font-size: 16px;
        }

        .footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            font-size: 12px;
        }

        table,
        th,
        td,
        caption {
            border: 1px solid white;
            border-collapse: collapse;
            padding: 5px
        }

        table caption {
            background-color: aqua;
            font-weight: bold
        }

        tbody tr:nth-child(odd) {
            background-color: aqua;
        }

        td:nth-child(3),
        tfoot td:nth-child(2) {
            text-align: right;
            font-weight: bold
        }

        td:nth-child(3) {
            width: 35%
        }

        @media (max-width: 600px) {
            table caption {
                display: none;
            }
        }
    </style>
</head>

<body>
    <?php $valor = 0; ?>
    <header class="header">
        <h1>Relatório de clientes</h1>
    </header>


    @foreach ($cidade as $cid)
        <h1 style="text-align: center; margin-top:90px;"> {{ $cid }}
        </h1>
        <p>Total de clientes na cidade {{ $cid }} {{ $count[$cid] }}</p>


        <main class="main">

            <table>
                {{-- <caption>Cidades</caption> --}}
                {{-- <colgroup>
                <col span="2">
                <col span="1" style="background-color: aqua">
            </colgroup> --}}
                <thead>
                    <tr>
                        <th colspan="1">Cliente</th>
                        <th colspan="1">Valor</th>
                        <th colspan="1">Cidade</th>
                        <th colspan="1">Documento</th>
                        <th colspan="1">Empresa</th>
                        <th colspan="1">Data de Cadastro</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($clientes as $cliente)
                        @if ($cliente->cidade == $cid)
                            <tr>
                                <td>
                                    {{ $cliente->nome }}
                                </td>
                                <td>
                                    {{ $cliente->valor }}
                                </td>
                                <td style="text-align: center; ">
                                    {{ $cliente->cidade }}
                                </td>
                                <td>
                                    {{ $cliente->documento }}
                                </td>
                                <td>
                                    {{ $empresas[$cliente->id_empresa]->nome }}
                                </td>
                                <td>
                                    {{ $cliente->created_at }}
                                </td>
                            </tr>
                        @endif
                    @endforeach




                </tbody>
                <tfoot>
                    @foreach ($valores as $val => $key)
                        <tr>

                            @if ($val == $cid)
                                <td>Total </td>
                                <td>{{ number_format($key, 2, ',', '.') }}</td>
                                <?php $valor += $key; ?>
                            @endif
                        </tr>
                    @endforeach
                </tfoot>
            </table>
        </main>
    @endforeach
    <main class="main">

        <table>
            <td style="color:black; font-size:20px;">
                Total final R$ {{  number_format($valor, 2, ',', '.') }}
            </td>
        </table>
    </main>
</body>

</html>
