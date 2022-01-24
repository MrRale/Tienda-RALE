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
      <h4 class="card-title">Clientes con crédito cancelado</h4>
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
                @foreach($cancelados as $cancelado)
             <tr>
                  {{-- <input name="cliente_id" type="hidden" value="{{$c->id}}" /> --}}
                  <td>{{$cancelado->user->id}}</td>
                  <td>{{$cancelado->user->cedula}}</td>
                  <td>
                   {{$cancelado->id}}
                  </td>
                  <td>{{$cancelado->user->telefono}}</td>
                  <td>{{$cancelado->user->name}}</td>
                  <td>{{$cancelado->user->email}}</td>
                  <td>
                      <a target="_blank"  id="botoncol" href="" class="btn btn-outline-success" title="Ver factura"><li class="fas fa-file-pdf"></li></a>
                  
                      <a  id="botoncol" class="btn btn-outline-info" title="Detalle de cliente"><li class="fas fa-eye"></li></a>
                      <a  id="botoncol" class="btn btn-outline-danger" title="Eliminar"><li class="fas fa-trash"></li></a>
                 
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
  document.querySelector('#deleteproducto').addEventListener('submit', function(e) {
  var form = this;

  e.preventDefault(); // <--- prevent form from submitting

  swal({
      title: "Estas seguro?",
      text: "Al confirmar, el producto será eliminado permanentemente!",
      icon: "warning",
      buttons: [
        'No, cancelar!',
        'Yes, estoy seguro!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
       
          form.submit(); // <--- submit form programmatically
      
      } else {
        swal("Cancelado", "Tu producto no ha sido eliminado", "error");
      }
    })
});
</script>
@endsection