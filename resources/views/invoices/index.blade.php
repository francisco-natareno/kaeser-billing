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
      <th scope="col" class="text-center">{{ __('Factura') }}</th>
      <th scope="col" class="text-center">{{ __('Fecha') }}</th>
      <th scope="col" class="text-center">{{ __('Cliente') }}</th>
      <th scope="col" class="text-center">{{ __('Valor') }}</th>
      <th scope="col" class="text-center">{{ __('Estado') }}</th>
      <th scope="col" class="text-center" width="160px"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $key => $invoice)
  <tr>
    <th scope="row" class="text-center">{{ $invoice->invoice }}</th>
    <td class="text-center">{{ \Carbon\Carbon::parse($invoice->billing_date)->format('d/m/Y') }}</td>
    <td class="text-center">{{ $invoice->client->name ?? '' }}</td>
    <td class="text-center">{{ $invoice->currency.' '.number_format($invoice->value + $invoice->value,2) }}</td>
    <td class="text-center">{{ $invoice->status }}</td>
    <td class="text-center">
      {!! Form::open(['method' => 'POST','route' => ['invoices.transfer', $invoice->id],'style'=>'display:inline']) !!}  
      {!! Form::submit('Trasladar', ['class' => 'btn btn-success']) !!}
      {!! Form::close() !!}
      {!! Form::open(['method' => 'POST','route' => ['invoices.cancel', $invoice->id],'style'=>'display:inline']) !!}  
      {!! Form::submit('Cancelar', ['class' => 'btn btn-danger']) !!}
      {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
 </tbody>
</table>
</div>
@endsection