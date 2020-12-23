@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="direccion_origen">Direccion Origen</label>
            {!! Form::text('direccion_origen', null, ['id' => 'direccion_origen', 'placeholder' => 'Direccion Origen', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="direccion_destino">Direccion Destino</label>
            {!! Form::text('direccion_destino', null, ['id' => 'direccion_destino', 'placeholder' => 'Direccion Destino', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="fecha_hora">Fecha Hora</label>
            {!! Form::text('fecha_hora', null, ['id' => 'fecha_hora', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="cliente">Cliente</label>
            {!! Form::text('cliente', null, ['id' => 'cliente', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>

