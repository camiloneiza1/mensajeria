@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-11">
                    <h3>Lista de Mensajeros</h3>
                </div>
                <div class="col-1">
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                    </button>
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
                            <button class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
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