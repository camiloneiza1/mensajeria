<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="mensajero_id">Mensajero</label>
            {!! Form::select('mensajero_id', $mensajeros, null, ['id' => 'mensajero_id', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="km">Km</label>
            {!! Form::number('km', null, ['id' => 'km', 'class' => 'form-control', 'onkeyup' => 'calcularCosto(this.value)']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="costo">Costo</label>
            {!! Form::number('costo', null, ['id' => 'costo', 'placeholder' => 'Costo', 'class' => 'form-control', 'readonly' => true]) !!}
        </div>
    </div>
</div>