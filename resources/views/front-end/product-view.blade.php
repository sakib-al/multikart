@extends('front-end.layout.front-master')

<?php
$product_title = \App\Model\Product::where('url_slug',Request::segment(2))->first();
$product_sub = $product_title->sub_categories;
$sub_cat = \App\Model\SubCategory::where('id',$product_sub)->first();
?>
@section('page_title'){{ $product_title->name }} @endsection
@section('bread_title'){{ $sub_cat->name }} @endsection
@section('bread_subtitle'){{ $product_title->name }} @endsection


@section('content')
<section class="section-b-space">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 collection-filter">
                    {{-- <div class="collection-filter-block">
                        <div class="collection-mobile-back">
                            <span class="filter-back">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                back
                            </span>
                        </div>
                        <div class="collection-collapse-block border-0 open">
                            <h3 class="collapse-block-title">brand</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    <ul class="category-list">
                                        <li><a href="#">clothing</a></li>
                                        <li><a href="#">bags</a></li>
                                        <li><a href="#">footwear</a></li>
                                        <li><a href="#">watches</a></li>
                                        <li><a href="#">accessories</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="collection-filter-block">
                        <div class="product-service">
                            <div class="media">
                                <svg>
                                    <use xlink:href="{{ asset('front-end/assets/svg/icons.svg#returnable') }}"></use>
                                </svg>
                                <div class="media-body">
                                    <h4>10 days returnable</h4>
                                    <p>easy returnable policies</p>
                                </div>
                            </div>
                            <div class="media">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;" xml:space="preserve" width="512px" height="512px">
                                    <g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M472,432h-24V280c-0.003-4.418-3.588-7.997-8.006-7.994c-2.607,0.002-5.05,1.274-6.546,3.41l-112,160     c-2.532,3.621-1.649,8.609,1.972,11.14c1.343,0.939,2.941,1.443,4.58,1.444h104v24c0,4.418,3.582,8,8,8s8-3.582,8-8v-24h24     c4.418,0,8-3.582,8-8S476.418,432,472,432z M432,432h-88.64L432,305.376V432z"
                                                    fill="#ff4c3b" />
                                                <path
                                                    d="M328,464h-94.712l88.056-103.688c0.2-0.238,0.387-0.486,0.56-0.744c16.566-24.518,11.048-57.713-12.56-75.552     c-28.705-20.625-68.695-14.074-89.319,14.631C212.204,309.532,207.998,322.597,208,336c0,4.418,3.582,8,8,8s8-3.582,8-8     c-0.003-26.51,21.486-48.002,47.995-48.005c10.048-0.001,19.843,3.151,28.005,9.013c16.537,12.671,20.388,36.007,8.8,53.32     l-98.896,116.496c-2.859,3.369-2.445,8.417,0.924,11.276c1.445,1.226,3.277,1.899,5.172,1.9h112c4.418,0,8-3.582,8-8     S332.418,464,328,464z"
                                                    fill="#ff4c3b" />
                                                <path
                                                    d="M216.176,424.152c0.167-4.415-3.278-8.129-7.693-8.296c-0.001,0-0.002,0-0.003,0     C104.11,411.982,20.341,328.363,16.28,224H48c4.418,0,8-3.582,8-8s-3.582-8-8-8H16.28C20.283,103.821,103.82,20.287,208,16.288     V40c0,4.418,3.582,8,8,8s8-3.582,8-8V16.288c102.754,3.974,185.686,85.34,191.616,188l-31.2-31.2     c-3.178-3.07-8.242-2.982-11.312,0.196c-2.994,3.1-2.994,8.015,0,11.116l44.656,44.656c0.841,1.018,1.925,1.807,3.152,2.296     c0.313,0.094,0.631,0.172,0.952,0.232c0.549,0.198,1.117,0.335,1.696,0.408c0.08,0,0.152,0,0.232,0c0.08,0,0.152,0,0.224,0     c0.609-0.046,1.211-0.164,1.792-0.352c0.329-0.04,0.655-0.101,0.976-0.184c1.083-0.385,2.069-1.002,2.888-1.808l45.264-45.248     c3.069-3.178,2.982-8.242-0.196-11.312c-3.1-2.994-8.015-2.994-11.116,0l-31.976,31.952     C425.933,90.37,331.38,0.281,216.568,0.112C216.368,0.104,216.2,0,216,0s-0.368,0.104-0.568,0.112     C96.582,0.275,0.275,96.582,0.112,215.432C0.112,215.632,0,215.8,0,216s0.104,0.368,0.112,0.568     c0.199,115.917,91.939,210.97,207.776,215.28h0.296C212.483,431.847,216.013,428.448,216.176,424.152z"
                                                    fill="#ff4c3b" />
                                                <path
                                                    d="M323.48,108.52c-3.124-3.123-8.188-3.123-11.312,0L226.2,194.48c-6.495-2.896-13.914-2.896-20.408,0l-40.704-40.704     c-3.178-3.069-8.243-2.981-11.312,0.197c-2.994,3.1-2.994,8.015,0,11.115l40.624,40.624c-5.704,11.94-0.648,26.244,11.293,31.947     c9.165,4.378,20.095,2.501,27.275-4.683c7.219-7.158,9.078-18.118,4.624-27.256l85.888-85.888     C326.603,116.708,326.603,111.644,323.48,108.52z M221.658,221.654c-0.001,0.001-0.001,0.001-0.002,0.002     c-3.164,3.025-8.148,3.025-11.312,0c-3.125-3.124-3.125-8.189-0.002-11.314c3.124-3.125,8.189-3.125,11.314-0.002     C224.781,213.464,224.781,218.53,221.658,221.654z"
                                                    fill="#ff4c3b" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <div class="media-body">
                                    <h4>24 X 7 service</h4>
                                    <p>easy and fast services</p>
                                </div>
                            </div>
                            <div class="media">
                                <svg>
                                    <use xlink:href="{{ asset('front-end/assets/svg/icons.svg#warranty') }}"></use>
                                </svg>
                                <div class="media-body">
                                    <h4>1 Year Warranty</h4>
                                    <p>from the date of purchase</p>
                                </div>
                            </div>
                            <div class="media border-0 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px">
                                    <g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M498.409,175.706L336.283,13.582c-8.752-8.751-20.423-13.571-32.865-13.571c-12.441,0-24.113,4.818-32.865,13.569     L13.571,270.563C4.82,279.315,0,290.985,0,303.427c0,12.442,4.82,24.114,13.571,32.864l19.992,19.992     c0.002,0.001,0.003,0.003,0.005,0.005c0.002,0.002,0.004,0.004,0.006,0.006l134.36,134.36H149.33     c-5.89,0-10.666,4.775-10.666,10.666c0,5.89,4.776,10.666,10.666,10.666h59.189c0.014,0,0.027,0.001,0.041,0.001     s0.027-0.001,0.041-0.001l154.053,0.002c5.89,0,10.666-4.776,10.666-10.666c0-5.891-4.776-10.666-10.666-10.666l-113.464-0.002     L498.41,241.434C516.53,223.312,516.53,193.826,498.409,175.706z M483.325,226.35L226.341,483.334     c-4.713,4.712-11.013,7.31-17.742,7.32h-0.081c-6.727-0.011-13.025-2.608-17.736-7.32L56.195,348.746L302.99,101.949     c4.165-4.165,4.165-10.919,0-15.084c-4.166-4.165-10.918-4.165-15.085,0.001L41.11,333.663l-12.456-12.456     c-4.721-4.721-7.321-11.035-7.321-17.779c0-6.744,2.6-13.059,7.322-17.781L285.637,28.665c4.722-4.721,11.037-7.321,17.781-7.321     c6.744,0,13.059,2.6,17.781,7.322l57.703,57.702l-246.798,246.8c-4.165,4.164-4.165,10.918,0,15.085     c2.083,2.082,4.813,3.123,7.542,3.123c2.729,0,5.459-1.042,7.542-3.124l246.798-246.799l89.339,89.336     C493.128,200.593,493.127,216.546,483.325,226.35z"
                                                    fill="#ff4c3b" />
                                                <path
                                                    d="M262.801,308.064c-4.165-4.165-10.917-4.164-15.085,0l-83.934,83.933c-4.165,4.165-4.165,10.918,0,15.085     c2.083,2.083,4.813,3.124,7.542,3.124c2.729,0,5.459-1.042,7.542-3.124l83.934-83.933     C266.966,318.982,266.966,312.229,262.801,308.064z"
                                                    fill="#ff4c3b" />
                                                <path
                                                    d="M228.375,387.741l-34.425,34.425c-4.165,4.165-4.165,10.919,0,15.085c2.083,2.082,4.813,3.124,7.542,3.124     c2.731,0,5.459-1.042,7.542-3.124l34.425-34.425c4.165-4.165,4.165-10.919,0-15.085     C239.294,383.575,232.543,383.575,228.375,387.741z"
                                                    fill="#ff4c3b" />
                                                <path
                                                    d="M260.054,356.065l-4.525,4.524c-4.166,4.165-4.166,10.918-0.001,15.085c2.082,2.083,4.813,3.125,7.542,3.125     c2.729,0,5.459-1.042,7.541-3.125l4.525-4.524c4.166-4.165,4.166-10.918,0.001-15.084     C270.974,351.901,264.219,351.9,260.054,356.065z"
                                                    fill="#ff4c3b" />
                                                <path
                                                    d="M407.073,163.793c-2-2-4.713-3.124-7.542-3.124c-2.829,0-5.541,1.124-7.542,3.124l-45.255,45.254     c-2,2.001-3.124,4.713-3.124,7.542s1.124,5.542,3.124,7.542l30.17,30.167c2.083,2.083,4.813,3.124,7.542,3.124     c2.731,0,5.459-1.042,7.542-3.124l45.253-45.252c4.165-4.165,4.165-10.919,0-15.084L407.073,163.793z M384.445,231.673     l-15.085-15.084l30.17-30.169l15.084,15.085L384.445,231.673z"
                                                    fill="#ff4c3b" />
                                                <path
                                                    d="M320.339,80.186c2.731,0,5.461-1.042,7.543-3.126l4.525-4.527c4.164-4.166,4.163-10.92-0.003-15.084     c-4.165-4.164-10.92-4.163-15.084,0.003l-4.525,4.527c-4.164,4.166-4.163,10.92,0.003,15.084     C314.881,79.146,317.609,80.186,320.339,80.186z"
                                                    fill="#ff4c3b" />
                                                <path
                                                    d="M107.215,358.057l-4.525,4.525c-4.165,4.164-4.165,10.918,0,15.085c2.083,2.082,4.813,3.123,7.542,3.123     s5.459-1.041,7.542-3.123l4.525-4.525c4.165-4.166,4.165-10.92,0-15.085C118.133,353.891,111.381,353.891,107.215,358.057z"
                                                    fill="#ff4c3b" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <div class="media-body">
                                    <h4>online payment</h4>
                                    <p>Contrary to popular belief.</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            <h4>${{ $item->price }}</h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- side-bar single product slider end -->
                </div>
                <div class="col-lg-9 col-sm-12">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="filter-main-btn mb-2"><span class="filter-btn"><i class="fa fa-filter" aria-hidden="true"></i> Sidebar</span></div>
                            </div>
                        </div>
                        <div class="product_data">
                            <input type="hidden" class="product_pk" value="{{ $shopview->id }}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product-slick">
                                        @foreach ($shopview->multipleImage as $view)
                                        <div>
                                            <img src="{{asset('/')}}images/product/{{ $view->name ?? 'no-image.jpg' }}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0">
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-12 p-0">
                                            <div class="slider-nav">
                                                @foreach ($shopview->multipleImage as $view)
                                                <div><img src="{{asset('/')}}images/product/{{ $view->name ?? 'no-image.jpg' }}" alt="" class="img-fluid blur-up lazyload"></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 rtl-text">
                                    <div class="product-right">
                                        <div class="product-count">
                                            <ul>
                                                <li>
                                                    <img src="{{ asset('front-end/assets/images/fire.gif') }}" class="img-fluid" alt="image">
                                                    <span class="p-counter">37</span>
                                                    <span class="lang">orders in last 24 hours</span>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('front-end/assets/images/person.gif') }}" class="img-fluid user_img" alt="image">
                                                    <span class="p-counter">{{ $shopview->view_count }}</span>
                                                    <span class="lang">People view this</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h2>{{ $shopview->name }}</h2>
                                        <div class="label-section">
                                            <span class="badge badge-grey-color">{{ $shopview->subcategories_item->name }}</span>
                                        </div>

                                        @php
                                            $main_price     = $shopview->price;
                                            $discount_value = $shopview->discount_value;
                                            $discount_price = ($main_price * $discount_value) / 100;
                                            $net_discount   = $main_price - $discount_price;
                                        @endphp

                                        <h3 class="price-detail">
                                            @if (date("Y-m-d") <= $shopview->discount_end)
                                                ৳{{ $net_discount }}
                                                @if ($shopview->discount_status == 1)
                                                <del>৳{{ $shopview->price }}</del><span>{{ $shopview->discount_value }}% off</span>
                                                @endif
                                            @else
                                            ৳{{ $main_price }}
                                            @endif
                                        </h3>
                                        <ul class="color-variant">
                                            <li class="bg-light0 active"></li>
                                            <li class="bg-light1"></li>
                                            <li class="bg-light2"></li>
                                        </ul>
                                        <form action="{{ route('cart.store') }}" method="POST" id="addToCart">
                                            <div id="selectSize" class="addeffect-section product-description border-product">
                                                <h6 class="product-title">quantity</h6>
                                                <div class="qty-box">
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <button type="button" class="btn quantity-left-minus" data-type="minus" data-field="">
                                                                <i class="ti-angle-left"></i>
                                                            </button>
                                                        </span>
                                                        <input type="text" name="quantity" id="quantity" class="form-control input-number" value="1">
                                                        <span class="input-group-prepend">
                                                            <button type="button" class="btn quantity-right-plus" data-type="plus" data-field="">
                                                                <i class="ti-angle-right"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-buttons">
                                                <button type="submit" id="cartEffect" data-pk="{{ $shopview->id }}" data-bs-target="#addtocart" class="btn btn-solid hover-solid btn-animation add-to-cart">
                                                    <i class="fa fa-shopping-cart me-1" aria-hidden="true"></i> add to cart</button>
                                                    <a href="#" class="btn btn-solid"><i class="fa fa-bookmark fz-16 me-2" aria-hidden="true"></i>wishlist</a>
                                            </div>
                                        </form>
                                        <div class="product-count">
                                            <ul>
                                                <li>
                                                    <img src="{{ asset('front-end/assets/images/icon/truck.png') }}" class="img-fluid" alt="image">
                                                    <span class="lang">Free shipping for orders above ৳1000 BDT</span>
                                                </li>
                                            </ul>
                                        </div>
                                        @if (date("Y-m-d") <= $shopview->discount_end)
                                            @if ($shopview->discount_status == 1)
                                            <div class="border-product">
                                                <h6 class="product-title">Sales Ends In</h6>
                                                <div class="timer">
                                                    <p id="demo"></p>
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                        @if ($shopview->discount_status == 1)
                                        <div class="border-product">
                                            <h6 class="product-title">Sales Ends In</h6>
                                            <div class="expired">
                                                <p id="expired"></p>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="border-product">
                                            <h6 class="product-title">shipping info</h6>
                                            <ul class="shipping-info">
                                                <li>100% Original Products</li>
                                                <li>Free Delivery on order above BDT. 1000Tk</li>
                                                <li>Pay on delivery is available</li>
                                                <li>Easy 30 days returns and exchanges</li>
                                            </ul>
                                        </div>
                                        <div class="border-product">
                                            <h6 class="product-title">share it</h6>
                                            <div class="product-icon">
                                                <ul class="product-social">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="tab-product m-0">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-selected="true">
                                        <i class="icofont icofont-ui-home"></i>Details</a>
                                        <div class="material-border"></div>
                                    </li>

                                    <li class="nav-item"><a class="nav-link" id="review-view" data-bs-toggle="tab" href="#view-review" role="tab" aria-selected="false">
                                        <i class="icofont icofont-contacts"></i>Review</a>
                                        <div class="material-border"></div>
                                    </li>

                                    <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab" href="#top-review" role="tab" aria-selected="false">
                                        <i class="icofont icofont-contacts"></i>Write Review</a>
                                        <div class="material-border"></div>
                                    </li>
                                </ul>
                                <div class="tab-content nav-material" id="top-tabContent">
                                    <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                        <div class="product-tab-discription">
                                            <div class="part">
                                                {!! $shopview->description !!}
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                                        <form class="theme-form" action="{{ route('review.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $shopview->id }}">
                                            <div class="form-row row">
                                                <div class="col-md-12">
                                                    <div class="media">
                                                        <label>Rating</label>
                                                        <div class="media-body ms-3">
                                                            <div class="rating three-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="review">Review Title</label>
                                                    <input type="text" class="form-control" name="review_title" id="review" placeholder="Enter your Review Subjects" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="review">Review Description</label>
                                                    <textarea class="form-control" placeholder="Wrire Your Review" name="review_description" id="exampleFormControlTextarea1" rows="6"></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-solid" type="submit">Submit YOur Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="view-review" role="tabpanel" aria-labelledby="review-view">

                                        {{-- <div class="empty-review">
                                            <h3 class="text-center">Ops!! No review found!</h3>
                                        </div> --}}
                                        <div class="row">
                                            @foreach ($review as $product_review)
                                            <div class="review-box">
                                                <div class="col-md-12 pt-3">
                                                    <div class="media">
                                                        <div class="media-body ms-3">
                                                            <div class="rating three-star"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="review-date">
                                                            <p>{{ \Carbon\Carbon::parse($product_review->created_at)->format('M d Y') }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="user-profile">
                                                        <div class="user-image">
                                                            <img src="{{asset('/')}}images/users/{{ $product_review->user_image ?? 'no-image.jpg' }}" alt="user-name">
                                                        </div>
                                                        <div class="user-name"><p>{{ $product_review->name }}</p></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 pt-3">
                                                    <div class="review-description">
                                                        <h5>{{ $product_review->review_title }}</h5>
                                                        <p>{{ $product_review->review_details }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Releated Product --}}

<section class="section-b-space pt-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col-12 product-related">
                <h2>related products</h2>
            </div>
        </div>
        <div class="row search-product">
            @foreach ($releatedproduct as $releated)
            <div class="col-xl-2 col-md-4 col-6">
                <div class="product-box">
                    <div class="img-wrapper">
                        <div class="front">
                            <a href="{{ route('shop.view',$releated->url_slug) }}">
                                <img src="{{asset('/')}}images/product/{{ $releated->singleImage->name ?? 'no-image.jpg' }}" class="img-fluid blur-up lazyload bg-img" alt="">
                            </a>
                        </div>
                        <div class="back">
                            <a href="{{ route('shop.view',$releated->url_slug) }}"><img src="{{asset('/')}}images/product/{{ $releated->singleImageBack->name ?? 'no-image.jpg' }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                        <div class="cart-info cart-wrap">
                            <button data-bs-toggle="modal" data-bs-target="#addtocart" title="Add to cart"><i class="ti-shopping-cart add-to-cart" data-pk="{{ $releated->id }}"></i></button>
                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="ti-heart" aria-hidden="true"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i class="ti-search" data-id="{{ $releated->id }}" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-detail">
                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                        <a href="product-page(no-sidebar).html">
                            <h6>{{ $releated->name }}</h6>
                        </a>
                        <h4>${{ $releated->price }}</h4>
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
                            <div class="product-buttons">
                                <a href="#" id="product-view-pk" data-pk="" class="btn btn-solid add-to-cart">add to cart</a>
                                <a id="quick_view_detail" href="#" class="btn btn-solid">view detail</a>
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
{{-- <script src="{{ asset('front-end/assets/js/timer.js') }}"></script> --}}
<script src="{{ asset('front-end/assets/js/jquery.elevatezoom.js') }}"></script>
<script src="{{ asset('front-end/assets/js/product-view-modal.js') }}"></script>
<script src="{{ asset('front-end/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('front-end/assets/js/add-to-cart.js') }}"></script>

<script>
$(document).ready(function() {

//    Set the date we're counting down to

var from_date = '{{ $shopview->discount_start }}';
var to_date = '{{ $shopview->discount_end }}';
if (to_date) {

    var countDownFrom = moment(from_date).format('MMM D, YYYY');
    var countDownDate = moment(to_date).format('MMM D, YYYY');
    countDownDate = new Date(countDownDate).getTime();
}else{
    var countDownDate = new Date("Sep 5, 2030 15:37:25").getTime();
}

//    Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime()- 60 * 60 * 24 * 1000;

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    var expired = $('#demo').html();

    if(expired !== undefined){
        document.getElementById("demo").innerHTML = "<span>" + days + "<span class='padding-l'>:</span><span class='timer-cal'>Days</span></span>" + "<span>" + hours + "<span class='padding-l'>:</span><span class='timer-cal'>Hrs</span></span>" +
            "<span>" + minutes + "<span class='padding-l'>:</span><span class='timer-cal'>Min</span></span>" + "<span>" + seconds + "<span class='timer-cal'>Sec</span></span> ";
    }


    // If the count down is over, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("expired").innerHTML = "EXPIRED";
    }
}, 1000);

});
</script>
@endpush

