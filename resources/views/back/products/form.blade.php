<div class="form-group">
    {{ Form::label('name', 'Nombre:')  }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('price', 'Precio:') }}
    {{ Form::number('price', null, ['class' => 'form-control', 'step' => 'any']) }}
</div>

<div class="form-group">
    {{ Form::label('market_id', 'Market:')  }}
    <select class="form-control" name="market_id" id="market_list">
        <option value=""></option>

        @foreach($markets as $market)
            <option value="{{$market->id}}">{{$market->name}} ({{$market->address}})</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {{ Form::label('brand_id', 'Marca:') }}
    <select name="brand_id" class="form-control" id="brand_list">
        <option value=""></option>

        @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {{ Form::label('type_id', 'Tipo de Producto:') }}
    <select name="type_id" class="form-control" id="type_list">
        <option value=""></option>

        @foreach($product_types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {{ Form::label('amount', 'Cantidad:')  }}
    {{ Form::text('amount', null, ['class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Descripcion:')  }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'size' => '30x5']) }}
</div>