@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>{{ __('Mostrar Usuario') }}</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('users.index') }}">{{ __('Regresar') }}</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Nombre:') }}</strong>
        {{ $user->first_name }}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Email:') }}</strong>
        {{ $user->email }}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>{{ __('Roles:') }}</strong>
        @if(!empty($user->getRoleNames()))
          @foreach($user->getRoleNames() as $v)
            <label class="badge badge-success">{{ $v }}</label>
          @endforeach
        @endif
    </div>
  </div>
</div>
</div>
@endsection