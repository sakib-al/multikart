@extends('front-end.layout.front-master')

@section('page_title')Forget Your Password @endsection
@section('bread_title') @endsection
@section('bread_subtitle')Forget Password @endsection
@section('content')
        <!--section start-->
        <section class="pwd-page section-b-space">
            <div class="container">
                @include('front-end.layout.flash_message')
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <h2>Forget Your Password</h2>
                        <form class="theme-form" action="{{ route('reset.password') }}" method="POST" >
                            @csrf
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Your Email" autocomplete="email" autofocus required="">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-solid w-auto">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--Section ends-->
@endsection
