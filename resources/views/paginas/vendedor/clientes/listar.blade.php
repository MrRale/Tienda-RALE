@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Clientes
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Clientes</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Cliente #</th>
                    <th>Cédula</th>
                    <th>Cuentas</th>
                    <th>Teléfono</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clientes as $c)
              <tr>
                 {{--  apertura de formulario de abonar --}}
                <form action="{{route('admin.guardarAbono')}}" id="formAbono{{$c->id}}" class="d-hidden" method="POST" >
                  @csrf
                  <input name="cliente_id" type="hidden" value="{{$c->id}}" />
                  <td>{{$c->id}}</td>
                  <td>{{$c->cedula}}</td>
                  <td>

              

                    <select id="cuenta" class="selectcuenta form-control" onchange="opcion()" name="cuenta_id" class="myniceselect nice-select wide" required>
                      {{-- <option selected="true" disabled="disabled">Cuentas</option> --}}
                      @foreach($c->cuentas as $cuenta)
                      <option class="op" value="{{$cuenta->id}}">{{$cuenta->id}}</option>
                      @endforeach
                  </select>
               
               

                  </td>
                  <td>{{$c->telefono}}</td>
                  <td>{{$c->name}}</td>
                  <td>{{$c->email}}</td>

                </form> {{--  cierre de formulario de abonar --}}
             
                  <td>
                   
      {{--  apertura de formulario de abonosByCliente --}}
      <form action="{{route('admin.abonosByCliente')}}" id="formAbonos{{$c->id}}" class="d-hidden" method="POST" >
        @csrf
        <input name="cliente_id" type="hidden"  value="{{$c->id}}">
        <input name="idcuenta" id="idcuenta" type="hidden" value="" >
         </form> {{--  cierre de formulario de abonosByCliente --}}
                   

                  
                    <a onclick="event.preventDefault();
                    document.getElementById('formAbonos{{$c->id}}').submit();" id="botoncol" class="btn btn-outline-info " title ="Ver abonos"><i class="far fa-money-bill-alt"></i></a>
            
                      <a onclick="event.preventDefault();
                      document.getElementById('formAbono{{$c->id}}').submit();" id="botoncol" class="btn btn-outline-primary  ">Abonar</a>
          
                  
                  </td>
              </tr>
@endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <script src="{{asset('dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('dashboard/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('dashboard/js/off-canvas.js')}}"></script>
  <script src="{{asset('dashboard/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('dashboard/js/misc.js')}}"></script>
  <script src="{{asset('dashboard/js/settings.js')}}"></script>
  <script src="{{asset('dashboard/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('dashboard/js/data-table.js')}}"></script>
  
 
@endsection