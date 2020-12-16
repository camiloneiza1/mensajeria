@extends('layout.app')
@section('content')
<div class="card">
    {!! Form::open(['route' => 'mensajero.store', 'method' => 'POST']) !!}
    <div class="card-header">
        <h3 class="card-title">Formulario crear Mensajero</h3>
    </div>
    <div class="card-body">
            @include('mensajero.mensajeroForm')
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
        <a class="btn btn-dark" href="{{ route('mensajero.index') }}">
            Volver
        </a>
    </div>
    {!! Form::close() !!}
</div>
@endsection