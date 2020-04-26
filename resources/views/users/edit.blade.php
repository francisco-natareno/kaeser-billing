@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2 class="text-center">{{ __('Editar Usuario') }}</h2>
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

{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Nombre:') }}</strong>
        {!! Form::text('first_name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
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
        {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control','value' => @$user->password)) !!}
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
        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-success">{{ __('Actualizar Información') }}</button>
  </div>
</div>
{!! Form::close() !!}
</div>
@endsection