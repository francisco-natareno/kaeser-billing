@extends('layouts.app')

@section('content')
@include('messages')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Cambiar Contraseña') }}</div>
        <div class="card-body">
          <form method="POST" action="{{ route('changePassword') }}">
            @csrf
              <div class="form-group row">
                <label for="new-password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>
                  <div class="col-md-6">
                    <input id="current-password" type="password" class="form-control" name="current-password" required>
                  </div>
              </div>
              <div class="form-group row">
                <label for="new-password" class="col-md-4 control-label text-md-right">{{ __('New Password') }}</label>
                  <div class="col-md-6">
                    <input id="new-password" type="password" class="form-control" name="new-password" required>
                  </div>
              </div>
              <div class="form-group row">
                <label for="new-password-confirm" class="col-md-4 control-label text-md-right">{{ __('Confirm New Password') }}</label>
                  <div class="col-md-6">
                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                  </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Change Password') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection