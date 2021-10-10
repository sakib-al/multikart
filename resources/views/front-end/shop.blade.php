@extends('front-end.layout.front-master')
@section('page_title')Shop @endsection

@section('bread_title')Shop @endsection
@section('bread_subtitle')Shop @endsection

<?php
$get_cat = request()->get('subcat');
$get_size = request()->get('prd_size');
$get_color = request()->get('prd_color');
?>

@section('content')
<section class="section-b-space ratio_asos">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 collection-filter">
                    <!-- side-bar colleps block stat -->
                    <div class="collection-filter-block">
                        <!-- SubCategory filter start -->
                        <div class="collection-mobile-back">
                            <span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span>
                        </div>
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">Subcategories</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    @foreach ($subcatfilter as $filter_item)
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" name="subcat[]" value="{{ $filter_item->id }}" class="form-check-input category-filter" id="subcat-{{ $filter_item->id }}" @if (isset($get_cat) && count($get_cat) > 0)
                                        @foreach ($get_cat as $cat)
                                        @if ($cat == $filter_item->id)
                                        checked
                                        @endif
                                        @endforeach
                                        @endif>
                                        <label class="form-check-label" for="filter">{{ $filter_item->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- color filter start here -->
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">colors</h3>
                            <div class="collection-collapse-block-content">
                                <div class="color-selector">
                                    <ul>
                                        @foreach ($color as $prd_color)
                                            <li id="color_check" style="background-color: {{ $prd_color->color_code }}" name="prd_color[]" value="{{ $prd_color->id }}"
                                                @if (isset($get_color) && count($get_color) > 0)
                                                    @foreach ($get_color as $color)
                                                        @if ($color == $prd_color->id)
                                                            class="active"
                                                        @endif
                                                    @endforeach
                                                @endif
                                            ></li>
                                        {{-- <input type="hidden" name="prd_color[]" value="{{ $prd_color->id }}"> --}}
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- size filter start here -->
                        <div class="collection-collapse-block border-0 open">
                            <h3 class="collapse-block-title">size</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    @foreach ($size as $prd_size)
                                    <div class="form-check collection-filter-checkbox">
                                        <input type="checkbox" name="prd_size[]" value="{{ $prd_size->id }}" class="form-check-input size-filter" id="hundred"
                                        @if (isset($get_size) && count($get_size) > 0)
                                            @foreach ($get_size as $size)
                                                @if ($size == $prd_size->id)
                                                checked
                                                @endif
                                            @endforeach
                                        @endif>
                                        <label class="form-check-label" for="hundred">{{ $prd_size->code }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- price filter start here -->
                        {{-- <div class="collection-collapse-block border-0 open">
                            <h3 class="collapse-block-title">price</h3>
                            <div class="collection-collapse-block-content">
                                <div class="wrapper mt-3">
                                    <div class="range-slider">
                                        <input type="text" class="js-range-slider" value="" />
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- silde-bar colleps block end here -->
                    <!-- side-bar single product slider start -->
                    <div class="theme-card">
                        <h5 class="title-border">new product</h5>
                        <div class="offer-slider slide-1">
                            @foreach ($newproduct->chunk(3) as $new)
                                <div>
                                    @foreach ($new as $item)
                                    <div class="media">
                                        <a href="{{ route('shop.view',$item->url_slug) }}">
                                            <img class="img-fluid blur-up lazyload" src="{{asset('/')}}images/product/{{ $item->singleImage->name ?? 'no-image.jpg' }}" alt="">
                                        </a>
                                        <div class="media-body align-self-center">
                                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                            <a href="#">
                                                <h6>{{ $item->name }}</h6>
                                            </a>
                                            <h4>৳{{ $item->price }}</h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- side-bar single product slider end -->
                    <!-- side-bar banner start here -->
                    <div class="collection-sidebar-banner">
                        <a href="#">
                            <img src="{{ asset('front-end/assets/images/side-banner.png') }}" class="img-fluid blur-up lazyload" alt=""></a>
                    </div>
                    <!-- side-bar banner end here -->
                </div>
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top-banner-wrapper">
                                    <a href="#"><img src="{{ asset('front-end/assets/images/mega-menu/2.jpg') }}"
                                            class="img-fluid blur-up lazyload" alt=""></a>
                                    <div class="top-banner-content small-section">
                                        <h4>BIGGEST DEALS ON TOP BRANDS</h4>
                                        <p>The trick to choosing the best wear for yourself is to keep in mind your body type, individual style, occasion and also the time of day or weather. In addition to eye-catching products from top brands, we also
                                            offer an easy 30-day return and exchange policy, free and fast shipping across all pin codes, cash or card on delivery option, deals and discounts, among other perks. So, sign up now and shop for westarn
                                            wear to your heart’s content on Multikart. </p>
                                    </div>
                                </div>
                                <div class="collection-product-wrapper">
                                    <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter"
                                                            aria-hidden="true"></i> Filter</span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="search-count">
                                                        <h5>Showing Products 1-24 of 10 Result</h5>
                                                    </div>
                                                    <div class="collection-view">
                                                        <ul>
                                                            <li><i class="fa fa-th grid-layout-view"></i></li>
                                                            <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="collection-grid-view">
                                                        <ul>
                                                            <li><img src="{{ asset('front-end/assets/images/icon/2.png') }}" alt="" class="product-2-layout-view"></li>
                                                            <li><img src="{{ asset('front-end/assets/images/icon/3.png') }}" alt="" class="product-3-layout-view"></li>
                                                            <li><img src="{{ asset('front-end/assets/images/icon/4.png') }}" alt="" class="product-4-layout-view"></li>
                                                            <li><img src="{{ asset('front-end/assets/images/icon/6.png') }}" alt="" class="product-6-layout-view"></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-page-per-view">
                                                        <select>
                                                            <option value="High to low">24 Products Par Page
                                                            </option>
                                                            <option value="Low to High">50 Products Par Page
                                                            </option>
                                                            <option value="Low to High">100 Products Par Page
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="product-page-filter">
                                                        <select>
                                                            <option value="High to low">Sorting items</option>
                                                            <option value="Low to High">50 Products</option>
                                                            <option value="Low to High">100 Products</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid product-load-more">
                                        <div class="row margin-res">
                                            @foreach ($product as $allproduct)
                                            <div class="col-xl-3 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="lable-block">
                                                            @if (date("Y-m-d") <= $allproduct->discount_end)
                                                                @if ($allproduct->discount_status == 1)
                                                                <span class="lable3">-{{ $allproduct->discount_value }}%</span>
                                                                @endif
                                                            @endif
                                                            @if ($allproduct->best_sell ==1)
                                                            <span class="lable4">on sale</span>
                                                            @endif
                                                        </div>
                                                        <div class="front">
                                                            <a href="{{ route('shop.view',$allproduct->url_slug) }}">
                                                                <img src="{{asset('/')}}images/product/{{ $allproduct->singleImage->name ?? 'no-image.jpg' }}" class="img-fluid blur-up lazyload bg-img" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="back">
                                                            <a href="{{ route('shop.view',$allproduct->url_slug) }}">
                                                                <img src="{{asset('/')}}images/product/{{ $allproduct->singleImageBack->name ?? 'no-image.jpg' }}" class="img-fluid blur-up lazyload bg-img" alt="">
                                                            </a>
                                                        </div>
                                                        <input type="hidden" id="quantity" value="1">
                                                        <div class="cart-info cart-wrap">
                                                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i class="ti-shopping-cart add-to-cart" data-pk="{{ $allproduct->id }}"></i></button>
                                                                <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View">
                                                                    <i class="ti-search" data-id="{{ $allproduct->id }}" aria-hidden="true"></i>
                                                                </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-detail">
                                                        <div>
                                                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                            <a href="#">
                                                                <h6 id="filter_product_name">{{ $allproduct->name }}</h6>
                                                            </a>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                                                of type and scrambled it to make a type specimen book
                                                            </p>
                                                            <h4 id="filter_product_price">৳{{ $allproduct->price }}</h4>
                                                            <ul class="color-variant">
                                                                <li class="bg-light0"></li>
                                                                <li class="bg-light1"></li>
                                                                <li class="bg-light2"></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="load-more-sec"><a href="javascript:void(0)" class="loadMore">load more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Quick View Modal --}}

<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="quick-view-img"><img id="product-img" src="" alt="" class="img-fluid blur-up lazyload"></div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2 id="product-name">Women Pink Shirt</h2>
                            <h3 id="product-price">৳32.96</h3>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                            <div class="border-product">
                                <h6 class="product-title" >product details</h6>
                                <p id="product-summary">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                            </div>
                            <div class="product-description border-product">
                                <div class="size-box">
                                    <ul>
                                        <li class="active"><a href="javascript:void(0)">s</a></li>
                                        <li><a href="javascript:void(0)">m</a></li>
                                        <li><a href="javascript:void(0)">l</a></li>
                                        <li><a href="javascript:void(0)">xl</a></li>
                                    </ul>
                                </div>
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <button type="button" class="btn quantity-left-minus" data-type="minus" data-field="">
                                                <i class="ti-angle-left"></i>
                                            </button>
                                        </span>
                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field="">
                                            <i class="ti-angle-right"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buttons">
                                <a href="#" id="product-view-pk" data-pk="" class="btn btn-solid add-to-cart">add to cart</a>
                                <a href="#" id="quick_view_detail" class="btn btn-solid">view detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Quick View Modal End --}}
@endsection

@push('custom_js')
{{-- Ajax Modal Product view --}}
<script src="{{ asset('front-end/assets/js/product-view-modal.js') }}"></script>
<script src="{{ asset('front-end/assets/js/add-to-cart.js') }}"></script>
<script src="{{ asset('front-end/assets/js/add-to-wishlist.js') }}"></script>
<script src="{{ asset('front-end/assets/js/filter-product.js') }}"></script>
            
@endpush

