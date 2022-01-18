@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Abonos
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Abonos</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Abonos del cliente {{$cliente->name}}</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Abono #</th>
                    <th>Fecha</th>
                    <th>N° Cuenta</th>
                    <th>Saldo</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($abonos as $c)
              <tr>
                <form action="{{route('admin.guardarAbono')}}" id="formAbono{{$c->id}}" class="d-hidden" method="POST" >
                  @csrf
                  <input name="cliente_id" type="hidden" value="{{$c->id}}" />
                  <td>{{$c->id}}</td>
                  <td>{{$c->fecha}}</td>
                <td>{{$c->cuenta->id}}</td>
                <td>{{$c->cuenta->saldo}}</td>
                  </form>
                  <td>
                      <a id="botoncol" class="btn btn-outline-danger"><li class="fa fa-file-pdf"></li></a>
          
                      {{-- <form method="post" id="deleteproducto" action="{{url('admin/producto/'.$p->id)}}" class="d-inline">
                      @csrf
                      {{method_field('DELETE')}}
                      <button type="submit"  id="botoncol" class="btn btn-outline-danger" >Borrar</button>
                    </form> --}}
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
  
 <script>

</script>
@endsection