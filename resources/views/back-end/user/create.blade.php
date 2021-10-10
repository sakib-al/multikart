@extends('back-end.layout.master_back_end')

@section('master_title')Multikart - Users | Create @endsection
@section('page_title')Create Users @endsection
@section('bread_title')Users @endsection

@section('users')active @endsection
@section('user_list')active @endsection

@push('custom_css')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Dropzone css-->
<link rel="stylesheet" type="text/css" href="{{ asset('back-end/assets/css/image-uploader.min.css') }}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row product-adding">
        {!! Form::open([ 'class' => 'col-xl-12', 'route' => ['user.store'], 'method' => 'post', 'id' => 'quickForm', 'files' => true]) !!}
         @csrf
        {{-- <form action="{{ route('product.store') }}" class="col-xl-12" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            <div class="row product-adding">
                <div class="col-xl-6 offset-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Create User</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <div class="form-group">
                                    <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>User Name</label>
                                    <input class="form-control" id="validationCustom01"  name="user_name" type="text" required="">
                                </div>
                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>User Email</label>
                                    <input class="form-control" id="validationCustomtitle"  name="user_email" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0">Password</label>
                                    <input class="form-control" id="validationCustomtitle" name="user_pass" type="password">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"><span>*</span>User Status</label>
                                    <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                        <label class="d-block" for="edo-ani"><input class="radio_animated" id="edo-ani" type="radio" name="user_status"
                                            value="1">Enable</label>
                                        <label class="d-block" for="edo-ani1"><input class="radio_animated" id="edo-ani1" type="radio" name="user_status"
                                            value="0">Disable</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"><span>*</span>User Role</label>
                                    {!! Form::select('user_roles', $role, null, ['class'=>'custom-select', 'id' => 'role', 'placeholder' => 'Select User Role', 'required']) !!}
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0"> Update profile picture</label>
                                    <div class="user_image_uploader" name='images' style="padding-top: .5rem;" title="Click for photo upload"></div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="product-buttons text-center">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a href="{{ route('user.index') }}" type="button" class="btn btn-light">Discard</a>
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

@push('custom_js')

<!--dropzone js-->
<script src="{{ asset('back-end/assets/js/image-uploader.min.js') }}"></script>

<script>
    $(function () {
      $('.user_image_uploader').imageUploader();
      });
 </script>
@endpush
