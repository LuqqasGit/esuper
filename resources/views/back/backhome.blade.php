@extends('back.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="row">
        <div class="btn-group btn-group-lg col-sm-12" role="group" aria-label="Index">
            <a href="{{url('admin/product')}}" class="btn btn-success col-sm-6" role="button">Productos</a>
            <a href="{{url('admin/markets')}}" class="btn btn-info col-sm-6" role="button">Markets</a>
        </div>
    </div>


    {{--<div class="row">--}}

        {{--<div id="products" class="col-sm-6">--}}
                {{--<div class="square front">--}}
                    {{--Productos--}}
                {{--</div>--}}

                {{--<div class="square back">--}}
                    {{--<a href="{{url('admin/product')}}">Ir a Productos</a>--}}
                {{--</div>--}}
        {{--</div>--}}


        {{--<div id="markets" class="col-sm-6">--}}
                {{--<div class="square front">--}}
                    {{--Markets--}}
                {{--</div>--}}

                {{--<div class="square back">--}}
                    {{--<a href="{{url('admin/markets')}}">Ir a Markets</a>--}}
                {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<style>--}}
        {{--.square {--}}
            {{--background-color: black;--}}
            {{--border-radius: 15px;--}}
            {{--text-align: center;--}}
            {{--padding: 2em;--}}
            {{--font-weight: bold;--}}
            {{--height: 800px;--}}
            {{--border: 2px solid black;--}}
        {{--}--}}
        {{--.front {--}}
            {{--background-color: yellow;--}}
        {{--}--}}

        {{--.back {--}}
            {{--background-color: green;--}}
        {{--}--}}

    {{--</style>--}}
@endsection