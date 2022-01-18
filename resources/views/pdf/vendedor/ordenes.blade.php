<!DOCTYPE html>
<html>

<head>
    <title>Pedido del cliente</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <style>
        body {
            background-color: white;
        }

        .page-break {
            page-break-after: always;
        }

        .container {
            width: 900px;
            background-color: green !important;
            display: flex;
            text-align: center;

        }

        .titulo {
            padding-top: 20px;
            font-size: 30px;
            font-weight: 700;
            color: #3a879e !important;
        }

        .contenido {
            padding-top: 150px;
        }

        .img {
            max-width: 200px;
        }

        .informacion {
            display: flex;
            flex-direction: row;

        }

        .info-cliente {
            /* display:flex; */
            text-align: left;

        }

        .info-cliente h5 {
            font-weight: 700;
        }

        .info-factura {
            /* display:flex; */
            text-align: right;

        }

        .info-factura h5 {
            font-weight: 700;
        }

        .fila {
            margin-top: 200px !important;

        }

    </style>

    <div class="container">
        {{-- <img class="img" src="{{public_path('/images/logo/logoPassionReal.jpeg')}}"> --}}
        <div class="titulo"><a>Orden realizada por el vendedor {{$cliente->name}}</a></div>
        <div class="contenido">

            <div class="informacion">
                <div class="info-cliente">
                    <h5>Facturado a:</h5>
                    <p><small>ID/NIF/CIF:</small>{{ $orden->cedula }}</p>
                    <p><small>Nombre:</small>{{ $orden->nombres }}</p>
                </div>
                <div class="info-factura">
                    <h5>Factura N°: {{ $orden->id }} </h5>
                </div>
                <h5>Fecha:{{ date('d-m-Y', strtotime($orden->fecha)) }} </h5>
            </div>


            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th># Orden</th>
                        <th>Producto</th>
                        <th>Código</th>
                        <th>Valor unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach($ordenes as $p)
                        <tr class="fila">
                            <td>{{$p->id}}</td>
                            <td>{{$p->producto->nombre}}</td>
                            <td>{{$p->producto->codigo}}</td>
                            <td>{{$p->precio}}</td>
                            <td>{{$p->cantidad}}</td>
                            <td>{{$p->cantidad * $p->precio}}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="page-break"></div>
        <h1>Page 2</h1> --}}
</body>

</html>
