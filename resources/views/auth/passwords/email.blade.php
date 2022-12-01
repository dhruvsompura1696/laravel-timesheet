@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('password.email') }}" class="form w-100">
    @csrf
  <div class="text-center mb-10">
    <h1 class="text-dark fw-bolder mb-3">Forgot Password ?</h1>
    <div class="text-gray-500 fw-semibold fs-6">Enter your email to reset your password.</div>
  </div>
  @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
  @endif
  <div class="fv-row mb-8 fv-plugins-icon-container">
    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror bg-transparent" name="email" value="{{ old('email') }}" autocomplete="off">
    @error('email')
        <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="d-flex flex-wrap justify-content-center pb-lg-0">
    <button type="submit" class="btn btn-primary me-4">
      <span class="indicator-label">Send Password Reset Link</span>
      <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
      </span>
    </button>
    <a href="/login/" class="btn btn-light">Cancel</a>
  </div>
</form>
@endsection
