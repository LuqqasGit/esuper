@extends('back.master')

@section('title')
    Markets Dashboard
@endsection

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">Markets Dashboard {!! link_to_route('market.create', 'Create Market', [],['class' => 'btn btn-success']) !!}
        </div>
        <table class="table">
            <thead id="THEAD_1">
            <tr id="TR_2">
                <th id="TH_3">
                    #
                </th>
                <th id="TH_4">
                    Chain
                </th>
                <th id="TH_4">
                    Address
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
            @foreach($markets as $market)
                <tr id="TR_1">
                    <th id="TH_2">
                        {{ $market->id }}
                    </th>
                    <td id="TD_3">
                        {{ $market->name_id }}
                    </td>
                    <td id="TD_4">
                        {{ $market->address }}
                    </td>
                    <td id="TD_5">
                        {!! link_to_route('market.edit', 'Edit', [$market->id], ['class' => 'btn btn-info']) !!}
                    </td>
                    <td id="TD_5">
                        {{ Form::open(['route' => ['market.destroy', $market->id], 'method' => 'delete']) }}
                        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection