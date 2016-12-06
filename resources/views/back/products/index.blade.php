@extends('back.master')

@section('title')
    Panel de Control de Productos
@endsection

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Panel de Control de Productos {!! link_to_route('product.create', 'Crear Producto', [],['class' => 'btn btn-success']) !!}
        </div>
        <table class="table">
            <thead id="THEAD_1">
            <tr id="TR_2">
                <th id="TH_3" class="hidden-sm">
                    #
                </th>
                <th id="TH_4">
                    Nombre
                </th>
                <th id="TH_4" class="hidden-sm">
                    Tipo
                </th>
                <th id="TH_4" class="hidden-sm">
                    Marca
                </th>
                <th id="TH_4">
                    Market
                </th>
                <th id="TH_5" class="hidden-sm">
                    Precio
                </th>
                <th id="TH_5" class="hidden-sm">
                    Cantidad
                </th>
                <th id="TH_5" class="hidden-sm">
                    Descripción
                </th>
                <th id="TH_6">
                    Editar
                </th>
                <th id="TH_6">
                    Eliminar
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr id="TR_1">
                    <th id="TH_2" class="hidden-sm">
                        {{ $product->id }}
                    </th>
                    <td id="TD_3">
                        {{ $product->name }}
                    </td>
                    <td id="TD_4" class="hidden-sm">
                        {{ \App\Product_Types::find($product->type_id)->name }}
                    </td>
                    <td id="TD_4" class="hidden-sm">
                        {{ $product->brand->name }}
                    </td>
                    <td id="TD_4">
                        {{ $product->market->address }}
                    </td>
                    <td id="TD_4" class="hidden-sm">
                        $ {{ $product->price }}
                    </td>
                    <td id="TD_4" class="hidden-sm">
                        {{ $product->amount }}
                    </td>
                    <td id="TD_4" class="hidden-sm">
                        {{ $product->description }}
                    </td>
                    <td id="TD_5">
                        {!! link_to_route('product.edit', 'Editar', [$product->id], ['class' => 'btn btn-info']) !!}
                    </td>
                    <td id="TD_5">
                        {{ Form::open(['route' => ['product.destroy', $product->id], 'method' => 'delete']) }}
                        <button type="submit" class="btn btn-danger btn-mini">Eliminar</button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection