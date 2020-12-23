@extends('layout.app')
@section('content')
<div class="card">
    {!! Form::open(['route' => 'orden.store', 'method' => 'POST']) !!}
    <div class="card-header">
        <h3 class="card-title">Formulario crear Orden</h3>
    </div>
    <div class="card-body">
        @include('orden.ordenForm')
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
</div>
@endsection
@section('script')
<script>
    $(function () {
        $('#fecha_hora').datetimepicker();
    });
</script>

@endsection