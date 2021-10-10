@extends('front-end.layout.front-master')

@section('page_title')Forget Your Password @endsection
@section('bread_title') @endsection
@section('bread_subtitle')Forget Password @endsection

@section('content')
<style>
    .invalid-feedback{
        margin-top: -1.75rem !important;
    }
</style>
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Create New Password</h3>
                <div class="theme-card">
                    <form class="theme-form" action="{{ route('reset.password.new') }}" method="POST">

                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        {{-- <div class="form-row row">
                            <div class="col-md-6">
                                <label for="email">email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" onblur="duplicateEmail(this)">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-row row">

                            <div class="col-md-6">
                                <label for="review">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="review">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-solid w-auto">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
