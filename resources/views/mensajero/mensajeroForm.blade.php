
<div class="row">
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
    <div class="col-md-4">
        <div class="form-group">
            <label for="apellido">Apellido</label>
            {!! Form::text('apellido', null, ['id' => 'apellido', 'placeholder' => 'Apellido', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-4">
        <div class="form-group">
            <label for="email">Email</label>
            {!! Form::email('email', null, ['id' => 'email', 'placeholder' => 'ejemplo@dominio.com', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha Nacimiento</label>
            {!! Form::date('fecha_nacimiento', null, ['id' => 'fecha_nacimiento', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>
