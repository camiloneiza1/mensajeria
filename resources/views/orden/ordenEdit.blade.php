@extends('layout.app')
@section('content')
<div class="card">
    {!! Form::model($orden, ['route' => ['orden.update', $orden->id], 'method' => 'PUT']) !!}
    <div class="card-header">
        <h3 class="card-title">Formulario editar Orden</h3>
    </div>
    <div class="card-body">
        @include('orden.ordenForm')
        @include('orden.ordenFormAdmin')
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            Guardar
        </button>
        <a class="btn btn-dark" href="{{ route('orden.index') }}">
            Volver
        </a>
    </div>
    {!! Form::close() !!}
    <input type="hidden" id="ruta_calculoCosto" value="{{ route('orden.calculaCosto') }}">
</div>
@endsection
@section('scripts')
{!! Html::script('js/orden/orden.js') !!}
<script>
    $(function () {
        $('#fecha_hora').datetimepicker({
            format: 'YYYY-MM-DD HH:mm'
        });
    });
</script>

@endsection