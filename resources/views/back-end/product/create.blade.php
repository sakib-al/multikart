@extends('back-end.layout.master_back_end')
@section('master_title')Multikart - Product | Create @endsection

@section('add_product')active @endsection
@section('product')active @endsection

@section('page_title')Add Product @endsection
@section('bread_title')Product @endsection

@push('custom_css')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Dropzone css-->
<link rel="stylesheet" type="text/css" href="{{ asset('back-end/assets/css/image-uploader.min.css') }}">

<style>
    .discount-price{display: none}
    .discount-option{display: none}
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row product-adding">
        {!! Form::open([ 'class' => 'col-xl-12', 'route' => 'product.store', 'method' => 'post', 'id' => 'quickForm', 'files' => true]) !!}
         @csrf
        {{-- <form action="{{ route('product.store') }}" class="col-xl-12" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            <div class="row product-adding">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Gneral</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <div class="form-group">
                                    <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>Title</label>
                                    <input class="form-control" id="validationCustom01" name="title" type="text" required="">
                                </div>
                                <div class="form-group">
                                    <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>SKU</label>
                                    <input class="form-control" id="validationCustomtitle" name="sku" type="text" required="">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label"><span>*</span>Categories</label>
                                            {!! Form::select('category', $category, null, ['class'=>'custom-select', 'id' => 'category', 'placeholder' => 'Select Category', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label"><span>*</span>SubCategories</label>
                                            {!! Form::select('subcategory', array(), null, ['class'=>'custom-select', 'id' => 'subcategory', 'placeholder' => 'Select Subcategory', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label"><span>*</span>Product Color</label>
                                            {!! Form::select('prd_color', $color, null, ['class'=>'custom-select', 'id' => 'prd_color', 'placeholder' => 'Select Product Color', 'required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label"><span>*</span>Product Size</label>
                                            {!! Form::select('prd_size', $size, null, ['class'=>'custom-select', 'id' => 'prd_size', 'placeholder' => 'Select Size Color', 'required']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Sort Summary</label>
                                    <textarea rows="5" name="summary" cols="12"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom02" class="col-form-label"><span>*</span> Product Price</label>
                                    <input class="form-control" name="price" id="validationCustom02" type="number" required="">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Discount Price For Product</label>
                                        <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                            <label class="d-block" for="edo-ani">
                                                <input class="radio_animated discount" id="discount" type="checkbox" name="discount_status" value="1" onchange="discount_value()" >
                                                <span class="discount-enable">Enable</span>
                                            </label>
                                            <input class="form-control discount-price" placeholder="Enter discount percent" name="discount_price" id="validationCustom02" type="number" >
                                        </div>
                                    </div>
                                    <div class=" col-md-8">
                                        <div class="discount-option">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Discount Start Date</label>
                                                    <input type="date" name="discount_date_start" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Discount End Date</label>
                                                    <input type="date" name="discount_date_end" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label"><span>*</span>Active Status</label>
                                            <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                <label class="d-block" for="edo-ani"><input class="radio_animated" id="edo-ani" type="radio" name="status" value="1">Enable</label>
                                                <label class="d-block" for="edo-ani1"><input class="radio_animated" id="edo-ani1" type="radio" name="status" value="0">Disable</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label"><span>*</span>Product Status</label>
                                            <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                                <label class="d-block" for="edo-ani2">
                                                    <input class="radio_animated" id="edo-ani" type="checkbox" name="best_sell_status"  value="1">Best Seller</label>
                                                <label class="d-block" for="edo-ani3">
                                                    <input class="radio_animated" id="edo-ani1" type="checkbox" name="feature_status" value="1">Feature Product</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <label class="col-form-label pt-0"> Product Upload</label>
                                <div class="prod_def_photo_upload" name='image' style="padding-top: .5rem;" title="Click for photo upload"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Description</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <div class="form-group mb-0">
                                    <div class="description-sm">
                                        <textarea id="editor1" name="description" cols="10" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Meta Data</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0"> Meta Title</label>
                                    <input class="form-control" name="meta_title" id="validationCustom05" type="text"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Meta Description</label>
                                    <textarea rows="4" name="meta_description" cols="12"></textarea>
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
<!--ckeditor js-->
<script src="{{ asset('back-end/assets/js/editor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('back-end/assets/js/editor/ckeditor/styles.js') }}"></script>
<script src="{{ asset('back-end/assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ asset('back-end/assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>
<!--dropzone js-->
<script src="{{ asset('back-end/assets/js/image-uploader.min.js') }}"></script>

<script src="{{ asset('back-end/assets/js/back-panel/category.js') }}"></script>
<script>
    $(function () {
      $('.prod_def_photo_upload').imageUploader();
      });
 </script>
<script type="text/javascript">
    function discount_value()
    {
        if($('.discount').is(":checked")){

            $(".discount-option").show();
            $(".discount-price").show();
            $(".discount-enable").hide();
        }
        else{
            $(".discount-option").hide();
            $(".discount-price").hide();
            $(".discount-enable").show();
        }
    }
</script>
@endpush
