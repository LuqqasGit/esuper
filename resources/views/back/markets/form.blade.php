<div class="form-group">
    {{ Form::label('name', 'Name:')  }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('price', 'Price:') }}
    {{ Form::number('price', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('market_id', 'Market:')  }}
    {{ Form::select('market_id', [1 => 'Disco', 2 => 'Jumbo', 3 => 'Carrefour'], null, ['placeholder' => 'Choose market', 'class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('brand_id', 'Brand:')  }}
    {{ Form::select('brand_id', [1 => 'Fargo', 2 => 'Sancor', 3 => 'La Serenisima'], null, ['placeholder' => 'Choose brand', 'class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('type_id', 'Product Type:')  }}
    {{ Form::select('type_id', [1 => 'Bread', 2 => 'Rice', 3 => 'Milk'], null, ['placeholder' => 'Choose product type', 'class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description:')  }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'size' => '30x5']) }}
</div>

{{--<div class="form-group">--}}
    {{--{{ Form::label('image', 'Image:') }}--}}
    {{--{{ Form::file('image', ['class' => 'form-control']) }}--}}
{{--</div>--}}