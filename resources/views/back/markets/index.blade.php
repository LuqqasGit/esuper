@extends('back.master')

@section('title')
    Panel de Control de Markets
@endsection

@section('content')

    <div class="panel panel-info col-sm-12">
        <div class="panel-heading">Panel de Control de Markets {!! link_to_route('market.create', 'Crear Market', [],['class' => 'btn btn-success']) !!}
        </div>
        <table class="table">
            <thead id="THEAD_1">
            <tr id="TR_2">
                <th id="TH_3">
                    #
                </th>
                <th id="TH_4">
                    Cadena
                </th>
                <th id="TH_4">
                    Dirección
                </th>
                {{--<th id="TH_4">--}}
                    {{--Lat--}}
                {{--</th>--}}
                {{--<th id="TH_4">--}}
                    {{--Lng--}}
                {{--</th>--}}
                <th id="TH_6">
                    Editar
                </th>
                <th id="TH_6">
                    Eliminar
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
                        {{ $marketNames->find($market->name_id)->name }}
                    </td>
                    <td id="TD_4">
                        {{ $market->address }}
                    </td>
                    {{--<td id="TD_4">--}}
                        {{--{{ $market->lat }}--}}
                    {{--</td>--}}
                    {{--<td id="TD_4">--}}
                        {{--{{ $market->lng }}--}}
                    {{--</td>--}}
                    <td id="TD_5">
                        {!! link_to_route('market.edit', 'Editar', [$market->id], ['class' => 'btn btn-info']) !!}
                    </td>
                    <td id="TD_5">
                        {{ Form::open(['route' => ['market.destroy', $market->id], 'method' => 'delete']) }}
                        <button type="submit" class="btn btn-danger btn-mini">Eliminar</button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection