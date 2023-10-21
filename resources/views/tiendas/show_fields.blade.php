<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $tienda->nombre }}</p>
</div>

<!-- Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{{ $tienda->descripcion }}</p>
</div>

<!-- Categoria Field -->
<div class="col-sm-12">
    {!! Form::label('categoria', 'Categoria:') !!}
    <p>{{ $tienda->categoria }}</p>
</div>

