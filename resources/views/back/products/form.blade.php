<div class="form-group">
    {{ Form::label('name', 'Name:')  }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('price', 'Price:') }}
    {{ Form::number('price', null, ['class' => 'form-control', 'step' => 'any']) }}
</div>

<div class="form-group">
    {{ Form::label('market_id', 'Market:')  }}
{{--    {{ Form::select('market_id', [1 => 'Disco', 2 => 'Jumbo', 3 => 'Carrefour'], null, ['placeholder' => 'Choose market', 'class' => 'form-control', 'required' => 'required']) }}--}}
    <select class="form-control" name="market_id">
        @foreach($markets as $market)
            <option value="{{$market->id}}">{{$market->name_id}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {{ Form::label('brand_id', 'Brand:') }}
    <select name="brand_id" class="form-control">
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {{ Form::label('type_id', 'Product Type:')  }}
    {{ Form::select('type_id', [1 => 'Cookies', 2 => 'Bread'], null, ['placeholder' => 'Choose product type', 'class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description:')  }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'size' => '30x5']) }}
</div>

{{--<div class="form-group">--}}
    {{--{{ Form::label('image', 'Image:') }}--}}
    {{--{{ Form::file('image', ['class' => 'form-control']) }}--}}
{{--</div>--}}
