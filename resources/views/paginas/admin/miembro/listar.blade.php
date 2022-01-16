@extends('paginas.admin.dashboard')

@section('contenido')
<div class="page-header">
    <h3 class="page-title">
        Miembros
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Miembros</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Miembros</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Miembro #</th>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>RUC</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($miembros as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->cedula}}</td>
                    <td>{{$p->ruc}}</td>
                    <td>{{$p->telefono}}</td>
                    <td>{{$p->email}}</td>
                    <td>{{$p->getRoleNames()}}</td>
                    <td>
                  
                        <form method="post" id="deletemiembro" action="{{url('admin/producto/'.$p->id)}}" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit"  id="botoncol" class="btn btn-outline-danger" title="Eliminar miembro"><li class="fas fa-trash"></li></button>
                      </form>
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

  
 <script>
  document.querySelector('#deletemiembro').addEventListener('submit', function(e) {
  var form = this;

  e.preventDefault(); // <--- prevent form from submitting

  swal({
      title: "Estas seguro?",
      text: "Al confirmar, el miembro será eliminado permanentemente!",
      icon: "warning",
      buttons: [
        'No, cancelar!',
        'Si, estoy seguro!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
       
          form.submit(); // <--- submit form programmatically
      
      } else {
        swal("Cancelado", "El miembro no ha sido eliminado", "error");
      }
    })
});
</script>
@endsection