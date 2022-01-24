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
      Categorías
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Categorías</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Categorías</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Categoría #</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Inventario</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($categorias as $categoria)
                <tr>
                    <td>{{$categoria->id}}</td>
                    <td>{{$categoria->nombre}}</td>
                    <td>{{$categoria->descripcion}}</td>
                    <td><img src="{{asset('storage').'/'.$categoria->imagen}}" alt="imagen de categoria"></td>
                   
                 <form id="formFiltro{{$categoria->id}}" method="POST" action="{{route('producto.productosByCategoriaInventario')}}">
                  @csrf  
                  <input type="hidden" value="{{$categoria->id}}" name="categoria_id">
                 <td>
                    <select id="inventario" class="selectcuenta form-control"  name="inventario_id" class="myniceselect nice-select wide" required>
                      <option selected="true" disabled="disabled">Inventarios</option>
                      @foreach($inventarios as $inventario)
                      <option class="op" value="{{$inventario->id}}">{{$inventario->nombre}}</option>
                      @endforeach
                  </select>
                      </td>
                    </form>
                   <td>
                    <form method="post" id="deletecategoria" action="{{url('admin/categoria/'.$categoria->id)}}" class="d-inline">
                      @csrf
                      <a href="{{url('admin/categoria/'.$categoria->id.'/edit')}}" id="botoncol" class="btn btn-outline-primary " title ="Editar"><i class="fas fa-edit"></i></a>
                      {{method_field('DELETE')}}
                          <button type="submit"  id="botoncol" class="btn btn-outline-danger" title ="Eliminar"><i class="fas fa-trash"></i></button>
                       
                          <a onclick="event.preventDefault();
                          document.getElementById('formFiltro{{$categoria->id}}').submit();" id="botoncol" class="btn btn-outline-primary " title ="Productos por categoría"><i class="fas fa-filter"></i></a>
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
    document.querySelector('#deletecategoria').addEventListener('submit', function(e) {
    var form = this;
  
    e.preventDefault(); // <--- prevent form from submitting
  
    swal({
        title: "Estas seguro?",
        text: "Al confirmar, la categoría será eliminada permanentemente!",
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
          swal("Cancelado", "Tu categoría no ha sido eliminada", "error");
        }
      })
  });
 </script>

@endsection