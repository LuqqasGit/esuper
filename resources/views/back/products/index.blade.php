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
                <th id="TH_3">
                    #
                </th>
                <th id="TH_4">
                    Nombre
                </th>
                <th id="TH_4">
                    Tipo
                </th>
                <th id="TH_4">
                    Marca
                </th>
                <th id="TH_4">
                    Market
                </th>
                <th id="TH_5">
                    Precio
                </th>
                <th id="TH_5">
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
                    <th id="TH_2">
                        {{ $product->id }}
                    </th>
                    <td id="TD_3">
                        {{ $product->name }}
                    </td>
                    <td id="TD_4">
                        {{ \App\Product_Types::find($product->type_id)->name }}
                    </td>
                    <td id="TD_4">
                        {{ $product->brand->name }}
                    </td>
                    <td id="TD_4">
                        {{ $product->market->address }}
                    </td>
                    <td id="TD_4">
                        $ {{ $product->price }}
                    </td>
                    <td id="TD_4">
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