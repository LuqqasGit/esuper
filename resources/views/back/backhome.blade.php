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
@endsection