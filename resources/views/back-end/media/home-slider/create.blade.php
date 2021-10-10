@extends('back-end.layout.master_back_end')
@section('master_title')Multikart - Slide | Create @endsection

@section('slider')active @endsection
@section('media')active @endsection

@section('page_title')Add Slider @endsection
@section('bread_title')Home Slider @endsection

@push('custom_css')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Dropzone css-->
<link rel="stylesheet" type="text/css" href="{{ asset('back-end/assets/css/image-uploader.min.css') }}">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row product-adding">
        {!! Form::open([ 'class' => 'col-xl-12', 'route' => 'slider.store', 'method' => 'post', 'id' => 'quickForm', 'files' => true]) !!}
         @csrf
        {{-- <form action="{{ route('product.store') }}" class="col-xl-12" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            <div class="row product-adding">
                <div class="col-xl-6 offset-3">
                    <div class="card">
                        <div class="card-header">
                            <h5>Create Slider</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <div class="form-group">
                                    <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>Slider Name</label>
                                    <input class="form-control" id="validationCustom01" name="slide_name" type="text" required="">
                                </div>
                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>Slider Title</label>
                                    <input class="form-control" id="validationCustomtitle" name="slide_title" type="text" required="">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>Slider Subtitle</label>
                                    <input class="form-control" id="validationCustomtitle" name="slide_subtitle" type="text" required="">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"><span>*</span> Status</label>
                                    <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                        <label class="d-block" for="edo-ani"><input class="radio_animated" id="edo-ani" type="radio" name="status" value="1">Enable</label>
                                        <label class="d-block" for="edo-ani1"><input class="radio_animated" id="edo-ani1" type="radio" name="status" value="0">Disable</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0"> Slider Image Upload</label>
                                    <div class="prod_def_photo_upload" name='images' style="padding-top: .5rem;" title="Click for photo upload"></div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="product-buttons text-center">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a href="{{ route('product.index') }}" type="button" class="btn btn-light">Discard</a>
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

<script src="{{ asset('back-end/assets/js/back-panel/category.js') }}"></script>
<script>
    $(function () {
      $('.prod_def_photo_upload').imageUploader();
      });
 </script>
@endpush
