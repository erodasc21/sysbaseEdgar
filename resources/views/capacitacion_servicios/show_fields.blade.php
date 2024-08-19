<!-- Cliente Id Field -->
<div class="col-sm-12">
    {!! Form::label('cliente_id', 'Cliente:') !!}
    <p>{{ $capacitacionServicio->cliente->nombres .' '. $capacitacionServicio->cliente->apellidos }}</p>
</div>

<!-- Estado Id Field -->
<div class="col-sm-12">
    {!! Form::label('estado_id', 'Estado:') !!}
    <p>{{ $capacitacionServicio->estados->nombre }}</p>
</div>

<!-- Equipo Id Field -->
<div class="col-sm-12">
    {!! Form::label('equipo_id', 'Equipo:') !!}
    <p>{{ $capacitacionServicio->equipo->numero_serie }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>{{ $capacitacionServicio->user->name }}</p>
</div>

<!-- Precio Field -->
<div class="col-sm-12">
    {!! Form::label('precio', 'Precio:') !!}
    <p>{{ $capacitacionServicio->precio }}</p>
</div>

<!-- Fecha Recepcion Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_diagnostico', 'Fecha Diagnostico:') !!}
    <p>{{ $capacitacionServicio->fecha_diagnostico->format('d-m-Y') }}</p>
</div>

<!-- Problema Field -->
<div class="col-sm-12">
    {!! Form::label('problema', 'Problema:') !!}
    <p>{{ $capacitacionServicio->problema }}</p>
</div>

<!-- Fecha Diagnostico Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_diagnostico', 'Fecha Diagnostico:') !!}
    <p>{{ $capacitacionServicio->fecha_diagnostico->format('d-m-Y') }}</p>
</div>

<!-- Diagnostico Field -->
<div class="col-sm-12">
    {!! Form::label('diagnostico', 'Diagnostico:') !!}
    <p>{{ $capacitacionServicio->diagnostico }}</p>
</div>

<!-- Fecha Entrega Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_entrega', 'Fecha Entrega:') !!}
    <p>{{ $capacitacionServicio->fecha_entrega->format('d-m-Y')}}</p>
</div>

<!-- Solucion Field -->
<div class="col-sm-12">
    {!! Form::label('solucion', 'Solucion:') !!}
    <p>{{ $capacitacionServicio->solucion }}</p>
</div>

