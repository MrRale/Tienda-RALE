<!DOCTYPE html>
<html>
<head>
    <title>Comprobante de compra</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <style>
        body{
            background-color: white;
        }
        .page-break {
            page-break-after: always;
        }
        .container{
            width:900px;
            background-color:green!important;
            display:flex;
            text-align:center;
       
        }
        .titulo{
            padding-top:20px;
            font-size:30px;
            font-weight:700;
            color:#F20C93!important;
        }
        .contenido{
            padding-top:150px;
        }
        .img{
            max-width: 200px;
        }
        .informacion{
            display:flex;
            flex-direction:row;
            
        }
        .info-cliente{
            /* display:flex; */
            text-align:left;
           
        }
        .info-cliente h5{
            font-weight:700;
        }
        .info-factura{
            /* display:flex; */
            text-align:right;
          
        }
        .info-factura h5{
            font-weight:700;
        }
        </style>

        <div class="container">
            {{-- <img class="img" src="{{public_path('/images/logo/logoPassionReal.jpeg')}}"> --}}
            <div class="titulo"><a>ORDEN DE COMPRA</a></div>
            <div class="contenido">
           
                <div class="informacion">
                    <div class="info-cliente">
                        <h5>Facturado a:</h5>
                        <p><small>ID/NIF/CIF:</small>dfadf</p>
                        <p><small>Nombre:</small> dfda</p>
                    </div>
                    <div class="info-factura">
                        <h5>Factura N°: dfadf </h5>
                    </div>
                </div>


                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th># Orden</th>
                            <th>Fecha</th>
                            <th>DNI</th>
                            <th>Créditos</th>
                            <th>Costo/crédito</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
        
                    <tbody>
                            <tr>
                                <td>1</td>
                                <td>dfdfa</td>
                            
                                <td></td>
                                <td></td>
                                <td>0.20 EUR</td>
                                <td></td>
                              
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="page-break"></div>
        <h1>Page 2</h1> --}}
</body>
</html>