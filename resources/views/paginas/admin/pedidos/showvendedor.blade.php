@extends('paginas.admin.dashboard')

@section('contenido')
     @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" role="alert">
                    <span aria-button="true">&times;</span>
                </button>
            </div>
        @endif
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
<div class="page-header">
    <h3 class="page-title">
        Detalles de la orden
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">  Detalles de la orden</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">

      <div class="container-fluid">
        @if(!isset($vendedor->image->url))
        <img style="max-width:150px;" class="img-lg rounded-circle mb-3" src="{{asset('dashboard/images/user_default.png')}}" alt="foto">
        @else
          <img style="max-width:300px;" class="img-lg rounded-circle mb-3" src="{{$vendedor->image->url}}" class="card-img-top" alt="...">
         @endif

        
        <h3 class="text-right my-5">Orden&nbsp;&nbsp;# {{$orden->id}}</h3>
        <hr>
      </div>
      <div class="container-fluid d-flex justify-content-between">
        <div class="col-lg-3 pl-0">
          <p class="mt-5 mb-2"><b>Automotriz R.A.L.E</b></p>
          <p><br>Dirección<br>Ecuador, Quito-Quitumbe, calle Lirañan y Ñusta</p>
        </div>
        <div class="col-lg-3 pr-0">
          <p class="mt-5 mb-2 text-right"><b>Emitida por</b></p>
          <p class="text-right">{{$vendedor->name}},<br> {{$vendedor->cedula}},<br> {{$vendedor->telefono}}<br> {{$orden->direccion}}.</p>
        </div>
      </div>
      <div class="container-fluid d-flex justify-content-between">
        <div class="col-lg-3 pl-0">
          <p class="mb-0 mt-5">Fecha de compra : {{date('d-m-Y', strtotime($orden->fecha))}}</p>
          
          {{-- <p>Fecha de vencimiento : {{$orden->fecha_orden->addDays(3)}}</p> --}}
        </div>
      </div>



      <h4 class="card-title">Detalles del pedido</h4>



      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Producto #</th>
                    <th>Foto</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>TOTAL</th>
                    
                </tr>
              </thead>
              <tbody>
                  @foreach($ordenes as $detalle)
                <tr>
                    <td>{{$detalle->id}}</td>
                    <td>
                        <img src="  {{$detalle->producto->images->pluck('url')[0] }}" />
                    </td>
                    <td>{{$detalle->producto->nombre}}</td>
                    <td>{{$detalle->cantidad}}</td>
                    <td>{{$detalle->precio}}</td>
                    <td>{{$detalle->cantidad * $detalle->precio}}</td>
                    
                </tr>
@endforeach
              </tbody>
            </table>
            {{-- {!! $pedidos->links() !!} --}}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection