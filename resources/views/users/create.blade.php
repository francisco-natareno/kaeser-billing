@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2 class="text-center">{{ __('Crear Usuario') }}</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-secondary" href="{{ route('users.index') }}">{{ __('Regresar') }}</a>
    </div>
  </div>
</div>

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Nombre:') }}</strong>
        {!! Form::text('first_name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Apellido:') }}</strong>
        {!! Form::text('last_name', null, array('placeholder' => 'Apellido','class' => 'form-control')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Correo:') }}</strong>
        {!! Form::text('email', null, array('placeholder' => 'Correo','class' => 'form-control')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Contraseña:') }}</strong>
        {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Confirmar Contraseña:') }}</strong>
        {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Contraseña','class' => 'form-control')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Asignar Rol:') }}</strong>
        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-success">Guardar</button>
  </div>
</div>
{!! Form::close() !!}
</div>
@endsection