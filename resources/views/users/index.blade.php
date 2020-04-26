@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2 class="text-center">{{ __('Administración de Usuarios') }}</h2>
    </div>
    <div class="pull-right">
      <a class="btn btn-link" href="{{ route('users.create') }}">{{ __('Crear Usuario') }}</a>
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
      <th scope="col" class="text-center">{{ __('Nombre') }}</th>
      <th scope="col" class="text-center">{{ __('Apellido') }}</th>
      <th scope="col" class="text-center">{{ __('Correo') }}</th>
      <th scope="col" class="text-center">{{ __('Roles Asignados') }}</th>
      <th scope="col" class="text-center" width="160px"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $key => $user)
  <tr>
    <td class="text-center">{{ $user->first_name }}</td>
    <td class="text-center">{{ $user->last_name }}</td>
    <td class="text-center">{{ $user->email }}</td>
    <td class="text-center">
    @if(!empty($user->getRoleNames()))
      @foreach($user->getRoleNames() as $v)
        <label class="badge badge-success">{{ $v }}</label>
      @endforeach
    @endif
    </td>
    <td>
      <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">{{ __('Editar') }}</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
 </tbody>
</table>
{!! $data->render() !!}
</div>
@endsection