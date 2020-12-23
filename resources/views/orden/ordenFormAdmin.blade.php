<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="mensajero">Mensajero</label>
            {!! Form::text('mensajero', null, ['id' => 'mensajero', 'placeholder' => 'Mensajero', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="cost">Costo</label>
            {!! Form::number('cost', null, ['id' => 'cost', 'placeholder' => 'Costo', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>