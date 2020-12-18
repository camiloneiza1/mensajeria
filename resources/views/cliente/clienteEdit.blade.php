@extends('layout.app')
@section('content')
<div class="card">
    {!! Form::model($cliente, ['route' => ['cliente.update', $cliente->id], 'method' => 'PUT']) !!}
    <div class="card-header">
        <h3 class="card-title">Formulario editar Cliente</h3>
    </div>
    <div class="card-body">
        @include('cliente.clienteForm')
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            Actualizar
        </button>
        <a class="btn btn-dark" href="{{ route('cliente.index') }}">
            Volver
        </a>

    </div>
    {!! Form::close() !!}
</div>
@endsection