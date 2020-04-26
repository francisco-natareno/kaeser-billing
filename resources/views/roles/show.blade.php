@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2 class="text-center">{{ __('Privilegios del Rol') }}</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-secondary" href="{{ route('roles.index') }}">{{ __('Regresar') }}</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Nombre:') }}</strong>
        {{ $role->name }}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Privilegios:') }}</strong>
        @if(!empty($rolePermissions))
        <ul>
          @foreach($rolePermissions as $v)
          <li>{{ $v->name }}</li>
          @endforeach
        </ul>
        @endif
    </div>
  </div>
</div>
</div>
@endsection