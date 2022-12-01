@extends('layouts.app')

@section('content')
<form method="POST" action="/forgot-password" class="form w-100">
    @csrf
  <div class="text-center mb-10">
    <h1 class="text-dark fw-bolder mb-3">Reset Password</h1>
  </div>
  @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
  @endif
  <div class="fv-row mb-8 fv-plugins-icon-container">
    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror bg-transparent" name="email" value="{{ $email ?? old('email') }}" autofocus="off">
    @error('email')
        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="fv-row mb-8 fv-plugins-icon-container">
    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror bg-transparent" name="password" autocomplete="off">                            
    @error('password')
        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="fv-row mb-8 fv-plugins-icon-container">
    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control bg-transparent" name="password_confirmation" autocomplete="new-password">
    @error('password')
        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="d-flex flex-wrap justify-content-center pb-lg-0">
    <button type="submit" class="btn btn-primary me-4">
      <span class="indicator-label">Reset Password</span>
      <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
      </span>
    </button>
    <a href="/login/" class="btn btn-light">Cancel</a>
  </div>
</form>
@endsection
