@extends('paginas.admin.dashboard')


@section('contenido')
<link rel="stylesheet" href="{{asset('css/campoVisible.css')}}">

<div class="page-header">
    <h3 class="page-title">
       Registrar pedido
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Registrar pedido</li>
        </ol>
    </nav>
  </div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Registrar pedido</h4>
        <p class="card-description">
          
        </p>
        
        @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="forms-sample"  action="{{route('admin.guardarVenta')}}" method="POST" enctype = "multipart/form-data">
<div class="contenedor" style="display:flex; justify-content:space-around">
  <div class="formulario" style="min-width:380px;">
      @csrf
      <div class="form-group">
        <label for="exampleInputName1">Nombres *</label>
        <input name="nombres" type="text" class="form-control" id="exampleInputName1" placeholder="nombres" required>
      </div>
      <div class="form-group">
        <label for="exampleInputName1">Apellidos *</label>
        <input name="apellidos" type="text" class="form-control" id="exampleInputName1" placeholder="apellidos" required>
      </div>
      <div class="form-group">
        <label for="exampleInputName1">Cédula *</label>
        <input name="cedula" type="text" class="form-control" id="exampleInputName1" placeholder="cedula" required>
      </div>
      <div class="form-group">
        <label for="exampleInputName1">RUC</label>
        <input name="ruc" type="text" class="form-control" id="exampleInputName1" placeholder="ruc">
      </div>
      <div class="form-group">
        <label for="codigo">Correo electrónico *</label>
        <input name="email" type="text" class="form-control" id="exampleInputName1" placeholder="email" required>
      </div>
      <div class="form-group">
        <label for="codigo">Teléfono *</label>
        <input name="telefono" type="text" class="form-control" id="exampleInputName1" placeholder="telefono" required>
      </div>

      <div class="form-group">
        <label for="codigo">Empresa</label>
        <input name="empresa" type="text" class="form-control" id="exampleInputName1" placeholder="empresa">
      </div>
      <div class="form-group">
        <label for="codigo">Ciudad *</label>
        <select class="form-control" name="ciudad" class="myniceselect nice-select wide" required>
            <option data-display="Quito">Quito</option>
            <option value="SantoDomingo">Santo Domingo</option>
        </select>
    </div>
      <div class="form-group">
        <label for="codigo">Código postal *</label>
        <input name="codigopostal" type="text" class="form-control" id="exampleInputName1" placeholder="codigopostal" required>
      </div>
      <div class="form-group">
        <label for="codigo">Dirección *</label>
        <input name="direccion" type="text" class="form-control" id="exampleInputName1" placeholder="dirección" required>
      </div>

      <div class="form-group">
        <label for="exampleTextarea1">Descripción </label>
        <textarea name="descripcion" class="form-control" id="exampleTextarea1" rows="4"></textarea>
      </div>
    
      <div class="form-group">
        <label for="exampleInputEmail3">Imagen del deposito *</label>
        <input name="imagen" type="file" class="form-control" id="imagen" required>
      </div>

      {{-- <button type="submit" class="btn btn-primary mr-2">Enviar</button> --}}
      {{-- <button class="btn btn-light">Cancelar</button> --}}
  
   </div>

   <div class="datosPedido">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="text-align:center">
          <i class="fas fa-shopping-basket"></i>
          Datos del carrito
        </h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>
                  Producto
                </th>
                <th>
                  Descripción
                </th>
                <th>
                  Total ($)
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($shopping_cart->shopping_cart_details as $scd)
              <tr>
                <td class="py-1">
                  <img src="{{$scd->producto->images->pluck('url')[0]}}" alt="profile" class="img-sm rounded-circle"/>
                </td>
                <td>
                  {{$scd->producto->nombre}} x {{$scd->cantidad}}
                </td>
                <td>
               ${{$scd->cantidad * $scd->precio}}
                </td>
                
              </tr>
              @endforeach
            <tr>
              <td></td>
              <td>IVA (12%)</td>
              <td>${{$shopping_cart->total_impuesto()}}</td>
            </tr>
            <tr>
              <td></td>
              <td>Subtotal</td>
              <td style="font-weight: bold">${{$shopping_cart->subtotal()}}</td>
              <input type="hidden" id="subtotalcarrito" name="subtotalcarrito" value="{{$shopping_cart->subtotal()}}" />
              <input type="hidden" id="totalreq" name="totalreq" />
              <input type="hidden" id="cuotarequest" name="cuotarequest"  />
            </tr>

{{--        SELECCIONAR LA FORMA DE PAGO --}}
            <tr>
              <td></td>
              <td style="font-weight:bold;">Forma de pago</td>
              <td style="font-weight: bold">
                <select id="formapago"  onchange="opcion()" class="form-control" name="formapago" class="myniceselect nice-select wide" required>
                  <option selected="true" disabled="disabled">seleccione la forma</option>
                  <option value="1">Contado</option>
                  <option value="2">Crédito</option>
              </select>
              
              </td>
            </tr>

            <div class="es_credito ">
 {{--VALOR DE ABONO COMO ENTRADA --}}
 <tr id="tr1" style="display:" >
  <td></td>
  <td style="font-weight:bold;">Monto de entrada</td>
  <td style="font-weight: bold">
   <input id="entrada" type="number" min="0" class="form-control entrada" name="abono"/>
  </td>
</tr>

{{-- MESES A DIFERIR --}}
<tr id="tr2" style="display:">
  <td></td>
  <td style="font-weight:bold;">Meses a diferir los ${{$shopping_cart->subtotal()}}</td>
  <td style="font-weight: bold">
   <input id="mesesdiferir"  type="number" min="1" max="24"  class="form-control mesesdiferir" name="mesesdiferir"/>
  </td>
</tr>

   {{-- CUOTAS A PAGAR POR LOS MESES INGRESADOS --}}
   <tr  id="tr3" style="display:" >
    <td></td>
    <td style="font-weight:bold;">Cuotas a pagar:</td>
    <td style="font-weight: bold">
       $<span id="cuota">0</span> x <span id="meses">0</span> meses
    </td>
  </tr>
            </div>
           

         <div class="es_contado" id="es_contado">
              {{-- SI ES COMPRA DE CONTADO, SE APLICARA UN DESCUENTO --}}
              <tr id="tr4" style="display:">
                <td></td>
                <td style="font-weight:bold;">Descuento (10%):</td>
                <td style="font-weight: bold">
                   - $<span id="descuento">0</span>
                </td>
              </tr>
         </div>

         
            {{--MONTO TOTAL A CANCELAR POR PARTE DEL COMPRADOR--}}
            <tr>
              <td></td>
              <td style="font-weight:bold;">Total a pagar:</td>
              <td style="font-weight: bold">
                 $<span id="total">0</span>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
   

      <div class="opciones my-2 mx-auto">
        <a class="btn btn-info" href="{{url('/tienda')}}"><i class="fas fa-reply"></i> Ir a tienda</a>
        <button type="submit" class="btn btn-primary">Enviar</button>
        {{-- <button class="btn btn-light">Cancelar</button> --}}
        <a class="btn btn-warning" href="{{url('/cesta')}}"><i class="fas fa-edit"></i> Editar</a>
      </div>
    </div>
   </div>
</div>
</form>
      

      </div>
    </div>
  </div>

<script type="text/javascript">


function opcion(){

  var op = document.getElementById("formapago").value;
  console.log(op);
 
  var tr1 = document.getElementById('tr1').style;
  var tr2 = document.getElementById('tr2').style;
  var tr3 = document.getElementById('tr3').style;
  var tr4 = document.getElementById('tr4').style;

 
  //======== VALOR DEL DESCUENTO =======//
  var descuento = 0;
    subtotal = document.getElementById('subtotalcarrito').value;
    descuento = subtotal*0.1; //hacemos un descuento del 10%
    document.getElementById('descuento').textContent = descuento.toFixed(2);

  if(op == "1"){          //contado
    tr1.display='none';
    tr2.display='none';
    tr3.display='none';
    tr4.display='';
    const total = document.getElementById('subtotalcarrito').value;
    const descuento = document.getElementById('descuento').textContent;
    const t = document.getElementById('total').textContent = (total-descuento).toFixed(2);
    document.getElementById('totalreq').value = t;
    // const t = document.getElementById('total').textContent;
  }else{                  //credito
    console.log('op2');
    tr1.display='';
    tr2.display='';
    tr3.display='';
    tr4.display='none';//si es credito escondemos el descuento
    document.getElementById('entrada').disabled=false;
    document.getElementById('mesesdiferir').disabled=true;
    document.getElementById('total').textContent = totalpagar();
    // const t = document.getElementById('total').textContent;
    

  }

}


function fsubtotal(){
  var subtotal = document.getElementById('subtotalcarrito').value;
  var entrada = 0;
  var entrada = document.getElementById('entrada').value;
  subtotal = subtotal - entrada;
  return subtotal;
}

function fcuota(meses){
  var cuota = fsubtotal()/meses;
    var res = cuota*((6*meses)/100);
    cuota = cuota+res;
  return cuota;
}

function leerMeses(e){
  var meses = e.target.value;
  if(meses>3){
    var cuota = fcuota(meses);
  }
  else
  var cuota = subtotal/meses;
  document.getElementById('cuota').textContent = cuota.toFixed(2);
  document.getElementById('meses').textContent = meses;
  console.log(totalpagar());
  document.getElementById('total').textContent = totalpagar();
  document.getElementById('totalreq').value = totalpagar();
  }

  function totalpagar(){
    console.log('dentro de total pagar');
    var meses = document.getElementById('meses').textContent;
    console.log('los meses son: '+meses);
    var cuota = document.getElementById('cuota').textContent;
    document.getElementById('cuotarequest').value = cuota;
    var entrada = document.getElementById('entrada').value;
    var total = cuota*meses+Number(entrada);
    console.log('el total a pagar es: '+total);
    return total.toFixed(2);
  }

  function leerEntrada(e){
    var entrada = 0;
    var meses = 0;
     entrada = e.target.value; 
     if(entrada){
      document.getElementById('mesesdiferir').disabled=false;
     }
  }

  document.addEventListener('DOMContentLoaded', e => {

    document.getElementById('entrada').disabled=true;
    document.getElementById('mesesdiferir').disabled=true;
    document.querySelector('.mesesdiferir').addEventListener('change', leerMeses);
    document.querySelector('.entrada').addEventListener('change', leerEntrada);
    });
 
</script>

@endsection