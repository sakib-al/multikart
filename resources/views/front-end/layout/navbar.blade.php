<?php
$category = getNavCategory();
// $cart = getCartData();

?>

<nav id="main-nav">
    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
        <li>
            <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
        </li>
        <li><a href="{{ route('index') }}">Home</a></li>
        <li><a href="{{ route('shop') }}">Shop</a></li>
        <li><a href="{{ route('collection') }}">Collection</a></li>
        <li>
            <a href="#">Categories</a>
            <ul>
                @foreach ($category as $navcategory)
                <li><a href="#">{{ $navcategory->name }}</a>
                    <ul>
                        @foreach ($navcategory->subcategories_item as $subcategory)
                            <li><a href="{{ route('collection.view',$subcategory->url_slug) }}">{{ $subcategory->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach

            </ul>
        </li>
        <li><a href="{{ route('contact') }}">Contact Us</a></li>
    </ul>
</nav>
