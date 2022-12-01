@extends('layouts.app')

@section('content')
    <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="text-center mb-11">
        <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
        </div>
        
        <div class="fv-row mb-8 fv-plugins-icon-container">
        <input id="email" type="email" placeholder="Email" autocomplete="off" class="form-control @error('email') is-invalid @enderror bg-transparent" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
            @error('email')
                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="fv-row mb-3 fv-plugins-icon-container">
            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror bg-transparent" name="password" autocomplete="off">
            @error('password')
                <div class="fv-plugins-message-container invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>
        <a href="/password/forgot/" class="link-primary">Forgot Password ?</a>
        </div>
        <div class="d-grid mb-10">
        <button type="submit" class="btn btn-primary">
            <span class="indicator-label">Sign In</span>
            <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
        </div>
        </div>
    </form>
@endsection
