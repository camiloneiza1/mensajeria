@extends('layout.app')
@section('content')
    @if (Session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ Session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>    
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-11">
                    <h3>Lista de Clientes</h3>
                </div>
                <div class="col-1">
                    <a class="btn btn-primary btn-sm" href="{{ route('cliente.create') }}">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            
        </div>
        <div class="card-body">
            <table class="table table-stripped table-hover table-sm table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th colspan="2" style="width: 50px">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente['documento_id'] }}</td>
                        <td>{{ $cliente['nombre'] }}</td>
                        <td>{{ $cliente['direccion'] }}</td>
                        <td>{{ $cliente['telefono'] }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('cliente.edit', $cliente['id']) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            {!! Form::open(['route' => ['cliente.destroy', $cliente['id']], 'method' => 'DELETE']) !!}
                            <a class="btn btn-danger btn-sm btn_delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            {!! Form::close() !!}
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $clientes->links() !!}
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.btn_delete').click(function (e){
                e.preventDefault();
                Swal.fire({
                    title: 'Esta seguro de eliminar?',
                    text: "La accion no se puede revertir!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //ACCION DE ELIMINAR
                        let form = $(this).parents('form');
                        let url = form.attr('action');
                        let row = $(this).parents('tr');
                        
                        $.post(url,form.serialize(), function(result) {
                            row.fadeOut();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: result.message,
                                showConfirmButton: false,
                                timer: 3000
                            })
                        },'JSON');

                    }
                })
            });
        })
    </script>
@endsection