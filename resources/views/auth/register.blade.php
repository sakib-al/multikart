@extends('front-end.layout.front-master')

@section('page_title')
    Registration
@endsection

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
                <h3>create account</h3>
                <div class="theme-card">
                    <form class="theme-form" action="{{ route('register') }}" method="POST">

                        @csrf
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="email">Enter Your Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email">email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" onblur="duplicateEmail(this)">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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
                            <button type="submit" class="btn btn-solid w-auto">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@push('custom_js')
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    function duplicateEmail(e) {
    var email = $(e).val();
    var get_url = $('#base_url').val();
    $.ajax({
        type: "POST",
        url:get_url+'/user/check-email',
        data: {
            email: email
        },
        dataType: "json",
        success: function (data) {
            if (data == true) {
                toastr.error('User Already Exist');
                $('#email').val('');
            }
        },
        error: function (jqXHR, exception) {}
    });
    }
</script>
@endpush
@endsection
