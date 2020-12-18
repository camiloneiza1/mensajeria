
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
            <label for="tipo_doc">Tipo Documento</label>
            {!! Form::select('tipo_doc',
                [
                    'CC' => 'Cedula de ciudadania',
                    'TI' => 'Tarjeta de identidad',
                    'NIT' => 'NIT',
                ], 
                null, 
                ['id' => 'tipo_doc', 'class' => 'form-control', 'placeholder' => '.:Seleccione:.']
            )
            !!}

        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="documento_id">Documento</label>
            {!! Form::text('documento_id', null, ['id' => 'documento_id', 'placeholder' => 'Documento', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            {!! Form::text('nombre', null, ['id' => 'nombre', 'placeholder' => 'Nombre', 'class' => 'form-control']) !!}
        </div>
    </div>

</div>
<div class="row mt-2">
    <div class="col-md-4">
        <div class="form-group">
            <label for="direccion">Direccion</label>
            {!! Form::text('direccion', null, ['id' => 'direccion', 'placeholder' => 'Direccion', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="telefono">Telefono</label>
            {!! Form::text('telefono', null, ['id' => 'telefono', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>
