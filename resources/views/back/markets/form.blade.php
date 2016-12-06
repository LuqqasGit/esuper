<div class="form-group">
    {{ Form::label('name_id', 'Cadena:')  }}
    <select class="form-control" name="name_id" id="name_list">
        <option value=""></option>
        @foreach($marketNames as $marketName)
            <option value="{{$marketName->id}}">{{$marketName->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {{ Form::label('lat', 'Lat:')  }}
    {{ Form::number('lat', 3233430, ['class' => 'form-control', 'step' => 'any']) }}
</div>

<div class="form-group">
    {{ Form::label('lng', 'Lng:')  }}
    {{ Form::number('lng', 3434430, ['class' => 'form-control', 'step' => 'any']) }}
</div>

<div class="form-group">
    {{ Form::label('address', 'Direccion:')  }}
    {{ Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) }}
</div>