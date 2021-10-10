@extends('front-end.layout.front-master')
@section('page_title')Search @endsection

@section('content')

<section class="authentication-page">
    <div class="container">
        <section class="search-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <form class="form-header" method="get" action="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" aria-label="Amount (to the nearest dollar)" placeholder="Search Products......">
                                <div class="input-group-append">
                                    <button class="btn btn-solid"><i class="fa fa-search"></i>Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<section class="section-b-space ratio_asos">
    <div class="container">
        <div class="row search-product">
            @foreach ($search as $search_item)
            <div class="col-xl-2 col-md-4 col-6">
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="lable-block">
                            @if ($search_item->discount_status == 1)
                            <span class="lable3">-{{ $search_item->discount_value }}%</span>
                            @endif
                            @if ($search_item->best_sell ==1)
                            <span class="lable4">on sale</span>
                            @endif
                        </div>
                        <div class="front">
                            <a href="{{ route('shop.view',$search_item->url_slug) }}"><img src="{{asset('/')}}images/product/{{ $search_item->singleImage->name ?? 'no-image.jpg' }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="back">
                            <a href="{{ route('shop.view',$search_item->url_slug) }}"><img src="{{asset('/')}}images/product/{{ $search_item->singleImageBack->name ?? 'no-image.jpg' }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i class="ti-shopping-cart"></i></button>
                                <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View">
                                    <i class="ti-search" data-id="{{ $search_item->id }}" aria-hidden="true"></i>
                                </a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                        <a href="product-page(no-sidebar).html">
                            <h6>{{ $search_item->name }}</h6>
                        </a>
                        <h4>${{ $search_item->price }}</h4>
                        <ul class="color-variant">
                            <li class="bg-light0"></li>
                            <li class="bg-light1"></li>
                            <li class="bg-light2"></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Quick-view modal popup start-->
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
                            <h3 id="product-price">$32.96</h3>
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
                            <div class="product-buttons"><a href="#" class="btn btn-solid">add to cart</a> <a href="#" class="btn btn-solid">view detail</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->
@endsection

@section('custom_js')
<script src="{{ asset('front-end/assets/js/product-view-modal.js') }}"></script>
@endsection
