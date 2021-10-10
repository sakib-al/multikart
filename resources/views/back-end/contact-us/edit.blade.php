@extends('back-end.layout.master_back_end')
@section('master_title')Multikart - Contact Us @endsection

@section('web')active @endsection
@section('contact-us')active @endsection

@section('page_title')Edit Contact Us @endsection
@section('bread_title')Home Slider @endsection

@push('custom_css')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Dropzone css-->
<link rel="stylesheet" type="text/css" href="{{ asset('back-end/assets/css/image-uploader.min.css') }}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row product-adding">
        {!! Form::open([ 'class' => 'col-xl-12', 'route' => ['contact.update',$contact->id], 'method' => 'post', 'id' => 'quickForm', 'files' => true]) !!}
         @csrf
        {{-- <form action="{{ route('product.store') }}" class="col-xl-12" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            <div class="row product-adding">
                <div class="col-xl-6 offset-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Contact Us Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <div class="form-group">
                                    <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>Google Map Link</label>
                                    <input class="form-control" id="validationCustom01" name="google_map" value="{{ $contact->google_map }}" type="text" placeholder="Paste google map <iframe> code" required="">
                                </div>
                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>Phone No 1</label>
                                    <input class="form-control" id="validationCustomtitle" value="{{ $contact->phone_no_1 }}" name="phone_no_1" type="text" required="">
                                </div>
                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">Phone No 2</label>
                                    <input class="form-control" id="validationCustomtitle" value="{{ $contact->phone_no_2 }}" name="phone_no_2" type="text" >
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>Contact Address</label>
                                    <input class="form-control" id="validationCustomtitle" value="{{ $contact->contact_address }}" name="contact_us_address" type="text" required="">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>Email Address 1</label>
                                    <input class="form-control" id="validationCustomtitle" value="{{ $contact->email_address_1 }}" name="email_address_1" type="text" required="">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">Email Address 2</label>
                                    <input class="form-control" id="validationCustomtitle" value="{{ $contact->email_address_2 }}" name="email_address_2" type="text" >
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>Fax Address 1</label>
                                    <input class="form-control" id="validationCustomtitle" value="{{ $contact->fax_address_1 }}" name="fax_address_1" type="text" required="">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">Fax Address 2</label>
                                    <input class="form-control" id="validationCustomtitle" value="{{ $contact->fax_address_2 }}" name="fax_address_2" type="text" >
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label"><span>*</span> Status</label>
                                    <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                        <label class="d-block" for="edo-ani"><input class="radio_animated" id="edo-ani" type="radio" name="status" value="1"{{($contact->status==1)?"checked":""}}>Enable</label>
                                        <label class="d-block" for="edo-ani1"><input class="radio_animated" id="edo-ani1" type="radio" name="status" value="0"{{($contact->status==0)?"checked":""}}>Disable</label>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="product-buttons text-center">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a href="{{ route('contact.index') }}" type="button" class="btn btn-light">Discard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        {{-- </form> --}}
    </div>
</div>
@endsection

