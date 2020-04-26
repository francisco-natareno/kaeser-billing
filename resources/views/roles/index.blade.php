@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2 class="text-center">{{ __('Administración de Roles') }}</h2>
    </div>
    <div class="pull-right">
      @can('role-create')
        <a class="btn btn-link" href="{{ route('roles.create') }}">{{ __('Nuevo Rol') }}</a>
      @endcan
    </div>
  </div>
</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif

<table class="table table-hover table-borderless">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="text-center">{{ __('#') }}</th>
      <th scope="col" class="text-center">{{ __('Nombre') }}</th>
      <th scope="col" class="text-center" width="170px"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($roles as $key => $role)
    <tr>
      <td class="text-center">{{ ++$i }}</td>
      <td class="text-center">{{ $role->name }}</td>
      <td>
        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">{{ __('Detalle') }}</a>
          @can('role-edit')
            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">{{ __('Editar') }}</a>
          @endcan
          @can('role-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          @endcan
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{!! $roles->render() !!}
</div>
@endsection