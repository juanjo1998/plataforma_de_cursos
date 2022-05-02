{!! Form::label('name','Nombre de usuario') !!}
{!! Form::text('name', null, ['class' => 'form-control '.($errors->has('name') ? 'is-invalid' : '')]) !!}
@error('name')
    <span class="invalid-feedback">
        <strong>{{$message}}</strong>
    </span>
@enderror