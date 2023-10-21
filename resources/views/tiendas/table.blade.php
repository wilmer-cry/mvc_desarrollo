<div class="table-responsive">
    <table class="table" id="tiendas-table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripcion</th>
        <th>Categoria</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tiendas as $tienda)
            <tr>
                <td>{{ $tienda->nombre }}</td>
            <td>{{ $tienda->descripcion }}</td>
            <td>{{ $tienda->categoria }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tiendas.destroy', $tienda->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tiendas.show', [$tienda->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tiendas.edit', [$tienda->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
