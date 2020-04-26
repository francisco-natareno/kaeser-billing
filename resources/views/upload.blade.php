@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-info text-white">
          <div class="card-title text-center">
            <h4>{{ __('Cargar Archivo de SAP') }}</h4>
          </div>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
          @csrf
          <!-- print success message after file upload  -->
          @if(Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
              @php
                Session::forget('success');
              @endphp
            </div>
          @endif
            <div class="form-group" {{ $errors->has('filename') ? 'has-error' : '' }}><label for="filename"></label>
              <input type="file" name="filename" id="filename" class="form-control-file">
              <span class="text-danger"> {{ $errors->first('filename') }}</span>
            </div>
          </div>
          <div class="card-footer">
            <div class="form-group">
              <button type="submit" class="btn btn-success btn-md">{{ __('Subir Archivo') }}</button>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection