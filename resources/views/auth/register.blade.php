@extends('layouts.app')

@section('content')
<form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" id="kt_sign_up_form" method="POST" action="{{ route('register') }}">
   @csrf
  <div class="text-center mb-11">
    <h1 class="text-dark fw-bolder mb-3">Sign Up</h1>
  </div>
  <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
    <input id="name" placeholder="First Name" type="text" class="form-control @error('fname') is-invalid @enderror bg-transparent" name="fname" value="{{ old('fname') }}" autocomplete="off" autofocus>
    <div class="fv-plugins-message-container invalid-feedback">
        @error('fname')
            <div data-field="name" data-validator="notEmpty">First Name is required</div>
        @enderror
    </div>
  </div>
  <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
    <input id="name" placeholder="Last Name" type="text" class="form-control @error('lname') is-invalid @enderror bg-transparent" name="lname" value="{{ old('lname') }}" autocomplete="off" autofocus>
    <div class="fv-plugins-message-container invalid-feedback">
        @error('lname')
            <div data-field="name" data-validator="notEmpty">Last Name is required</div>
        @enderror
    </div>
  </div>
  <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" autocomplete="email">
    <div class="fv-plugins-message-container invalid-feedback">
        @error('email')
            <div data-field="email" data-validator="notEmpty">{{$message}}</div>
        @enderror
    </div>
  </div>
  <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid" data-kt-password-meter="true">
    <div class="mb-1">
      <div class="position-relative mb-3">
        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror bg-transparent" name="password" autocomplete="off" aria-autocomplete="list">
        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
          <i class="bi bi-eye-slash fs-2"></i>
          <i class="bi bi-eye fs-2 d-none"></i>
        </span>
      </div>
    </div>
    @error('password')
        <div class="fv-plugins-message-container invalid-feedback">
            <div data-field="password" data-validator="callback">{{$message}}</div>
        </div>
    @enderror
    
  </div>
  <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
    <input id="password-confirm" placeholder="Repeat Password" type="password" class="form-control bg-transparent" name="password_confirmation" autocomplete="off">
  </div>

  <div class="d-grid mb-10">
    <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
      <span class="indicator-label">Sign up</span>
      <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
      </span>
    </button>
  </div>
  <div class="text-gray-500 text-center fw-semibold fs-6 d-none">Already have an Account? <a href="/login/" class="link-primary fw-semibold">Sign in</a>
  </div>
</form>
@endsection
