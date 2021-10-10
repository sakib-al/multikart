@extends('front-end.layout.front-master')

@section('page_title')
    Verify your email
@endsection
@push('custom_css')
<style>

.verify_section .card{
border: 2px dashed #5fbcb4;
}
.verify_section .container{max-width: 1024px;}
.verify_detail p{font-size: 16px;}
.verify_detail span {
color: #5fcbc4;
text-decoration: underline;
}

@media screen and (max-width: 1024px) {
  .verify_section h1{
    font-size: 24px !important;
  }
  .verify_detail p{font-size: 14px !important;}
}
</style>
@endpush
@section('content')
<div class="verify_section pt-5 pb-5">
    <div class="container">
        <div class="card">
            @include('front-end.layout.flash_message')
            <div class="card-body text-center">
                <h1>Welcome To {{ env('APP_NAME') }}</h1>
                <h2>{{ $user->name }}</h2>
                <div class="verify_detail pt-3">
                    <p>Please Check your email <span>{{ $user->email }}</span> for verify your email address.</p>
                    <p>If you didn't receive verify email please click <span>Resend</span></p>
                    <a href="{{ route('send.token.registration') }}" class="btn btn-solid">Resend</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
