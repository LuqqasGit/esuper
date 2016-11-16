@extends('back.master')

@section('title')
    Products Dashboard
@endsection

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Products Dashboard {!! link_to_route('product.create', 'Create Product', [],['class' => 'btn btn-success']) !!}
        </div>
        <table class="table">
            <thead id="THEAD_1">
            <tr id="TR_2">
                <th id="TH_3">
                    #
                </th>
                <th id="TH_4">
                    Name
                </th>
                <th id="TH_4">
                    Type
                </th>
                <th id="TH_4">
                    Brand
                </th>
                <th id="TH_4">
                    Market
                </th>
                <th id="TH_5">
                    Price
                </th>
                <th id="TH_5">
                    Description
                </th>
                <th id="TH_6">
                    Edit
                </th>
                <th id="TH_6">
                    Delete
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
                        {{ $product->type_id }}
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
                        {!! link_to_route('product.edit', 'Edit', [$product->id], ['class' => 'btn btn-info']) !!}
                    </td>
                    <td id="TD_5">
                        {{ Form::open(['route' => ['product.destroy', $product->id], 'method' => 'delete']) }}
                        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection