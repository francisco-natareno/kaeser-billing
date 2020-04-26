@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2 class="text-center">{{ __('Control de Facturas') }}</h2>
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
      <th scope="col" class="text-center">{{ __('EMR') }}</th>
      <th scope="col" class="text-center">{{ __('Equipo') }}</th>
      <th scope="col" class="text-center">{{ __('Cliente') }}</th>
      <th scope="col" class="text-center">{{ __('Valor') }}</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $key => $machine)
  <tr>
    <th scope="row" class="text-center">{{ $machine->emr }}</th>
    <td class="text-center">{{ $machine->description }}</td>
    <td class="text-center">{{ $machine->client->name ?? '' }}</td>
    <td class="text-center">{{ $machine->serial }}</td>
  </tr>
 @endforeach
 </tbody>
</table>
</div>
@endsection