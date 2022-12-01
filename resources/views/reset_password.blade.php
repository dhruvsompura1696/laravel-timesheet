@extends('layouts.home')

@section('content')
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - New password -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
            <!--begin::Form-->
            <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10">
                    <!--begin::Form-->
                    <form class="form w-100" method="POST" action="reset-password">
                        @csrf
                        
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Setup New Password</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-500 fw-semibold fs-6">Have you already reset the password ? 
                            <a href="/login/" class="link-primary fw-bold">Sign in</a></div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    <div class="fv-plugins-message-container">
                                        <div data-field="password" data-validator="callback">{{ session('status') }}</div>
                                    </div>
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="password" data-validator="callback">{{ session('error') }}</div>
                                    </div>
                                    
                                </div>
                            @endif
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control bg-transparent" type="password" placeholder="Old Password" name="old_password" autocomplete="off" />                                    
                                </div>
                                @error('old_password')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="password" data-validator="callback">{{$message}}</div>
                                    </div>
                                @enderror                                
                                
                            </div>
                        </div>
                        <div class="fv-row mb-8" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" />                                    
                                </div>
                                @error('password')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="password" data-validator="callback">{{$message}}</div>
                                    </div>
                                @enderror
                               
                                
                            </div>
                        </div>
                        <div class="fv-row mb-8">
                            <input type="password" placeholder="Repeat Password" name="password_confirmation" autocomplete="off" class="form-control bg-transparent" />
                        </div>
                        
                        <div class="d-grid mb-10">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait... 
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            
        </div>
        <!--end::Body-->
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url({{asset('/storage/assets/assets/media/misc/auth-bg.png')}})">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                <!--begin::Logo-->
                <a href="/metronic8/demo8/../demo8/index.html" class="mb-0 mb-lg-12">
                    <img alt="Logo" src="{{asset('/storage/assets/assets/media/logos/logo.png')}}" class="h-60px h-lg-75px" />
                </a>
                <!--end::Logo-->
                <!--begin::Image-->
                <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="{{asset('/storage/assets/assets/media/misc/auth-screens.png')}}" alt="" />
                
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Authentication - New password-->
</div>
@endsection