@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Editar Usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Nombre de usuario</h5>
            <p class="form-control">{{$user->name}}</p>

            {{-- lista de roles --}}
            <h1>Lista de Roles</h1>

            {!! Form::model($user, ['route' => ['admin.users.update',$user],'method' => 'put']) !!}
                @foreach ($roles as $role)
                   <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                   </div>
                @endforeach
                {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop