<!-- Marca Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marca_id', 'Marca:') !!}
    {!!
        Form::select(
            'marca_id',
            select(\App\Models\CapacitacionMarca::class)
            , null
            , ['id'=>'marca_id','class' => 'form-control select2-multi','style'=>'width: 100%']
        )
    !!}

</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>
