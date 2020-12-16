@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-11">
                    <h3>Lista de Mensajeros</h3>
                </div>
                <div class="col-1">
                    <a class="btn btn-primary btn-sm" href="{{ route('mensajero.create') }}">
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
                        <th>Email</th>
                        <th>Fecha Nacimiento</th>
                        <th colspan="2" style="width: 50px">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mensajeros as $mensajero)
                    <tr>
                        <td>{{ $mensajero['documento_id'] }}</td>
                        <td>{{ $mensajero['nombre'].' '.$mensajero['apellido'] }}</td>
                        <td>{{ $mensajero['email'] }}</td>
                        <td>{{ $mensajero['fecha_nacimiento'] }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('mensajero.edit', $mensajero['id']) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection