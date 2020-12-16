@extends('layout.app')
@section('content')
<div class="card">
    {!! Form::model($mensajero, ['route' => ['mensajero.update', $mensajero->id], 'method' => 'PUT']) !!}
    <div class="card-header">
        <h3 class="card-title">Formulario editar Mensajero</h3>
    </div>
    <div class="card-body">
            @include('mensajero.mensajeroForm')
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            Actualizar
        </button>
        <a class="btn btn-dark" href="{{ route('mensajero.index') }}">
            Volver
        </a>

    </div>
    {!! Form::close() !!}
</div>
@endsection