@extends('layout.app')
@section('content')
<div class="card">
    {!! Form::open(['route' => 'cliente.store', 'method' => 'POST']) !!}
    <div class="card-header">
        <h3 class="card-title">Formulario crear Cliente</h3>
    </div>
    <div class="card-body">
            @include('cliente.clienteForm')
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
        <a class="btn btn-dark" href="{{ route('cliente.index') }}">
            Volver
        </a>
    </div>
    {!! Form::close() !!}
</div>
@endsection