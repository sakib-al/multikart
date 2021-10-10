{{-- Side Bar --}}

<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="{{ route('index') }}"><img class="blur-up lazyloaded" src="{{ asset('back-end/assets/images/dashboard/multikart-logo.png') }}" alt=""></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{asset('/')}}images/users/{{ Auth::user()->user_image ?? 'no-image.jpg' }}" alt="#">
            </div>
            <h6 class="mt-3 f-14">{{ Auth::user()->name }}</h6>
            <p>general manager.</p>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="sidebar-header @yield('dashboard')" href="{{ route('dashboard') }}"><i data-feather="home"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="@yield('product')"><a class="sidebar-header @yield('product')" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a class="@yield('category')" href="{{ route('category.index') }}"><i class="fa fa-circle"></i>Category</a></li>
                    <li><a class="@yield('subcategory')" href="{{ route('subcategory.index') }}"><i class="fa fa-circle"></i>Sub Category</a></li>
                    <li><a class="@yield('prd_size')" href="{{ route('size.index') }}"><i class="fa fa-circle"></i>Product Size</a></li>
                    <li><a class="@yield('prd_color')" href="{{ route('color.index') }}"><i class="fa fa-circle"></i>Product Color</a></li>
                    <li><a class="@yield('product_list')" href="{{ route('product.index') }}"><i class="fa fa-circle"></i>Product List</a></li>
                    <li><a class="@yield('add_product')" href="{{ route('product.create') }}"><i class="fa fa-circle"></i>Add Product</a></li>
                </ul>
            </li>
            <li class=" @yield('order') "><a class="sidebar-header @yield('order') " href=""><i data-feather="dollar-sign"></i><span>Sales</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a class=" @yield('order_list')" href="{{ route('order.index') }}"><i class="fa fa-circle"></i>Orders</a></li>
                    <li><a class=" @yield('transection')" href="{{ route('transection.index') }}"><i class="fa fa-circle"></i>Transactions</a></li>
                    <li><a class=" @yield('order_cancel')" href="{{ route('cancel.index') }}"><i class="fa fa-circle"></i>Order Cancellation</a></li>
                </ul>
            </li>
            {{-- <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>Coupons</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="coupon-list.html"><i class="fa fa-circle"></i>List Coupons</a></li>
                    <li><a href="coupon-create.html"><i class="fa fa-circle"></i>Create Coupons </a></li>
                </ul>
            </li> --}}
            <li><a class="sidebar-header" href="#"><i data-feather="clipboard"></i><span>Pages</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="pages-list.html"><i class="fa fa-circle"></i>List Page</a></li>
                    <li><a href="page-create.html"><i class="fa fa-circle"></i>Create Page</a></li>
                </ul>
            </li>
            <li class=" @yield('media') ">
                <a class="sidebar-header @yield('media')" href="#"><i data-feather="camera"></i><span>Media</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a class="@yield('gallery')" href="{{ route('media.index') }}"><i class="fa fa-circle"></i>Gallery</a></li>
                    <li><a class="@yield('slider')" href="{{ route('slider.index') }}"><i class="fa fa-circle"></i>Home Slider</a></li>
                </ul>
            </li>
            <li class="@yield('customers')"><a class="sidebar-header @yield('customers')" href="#"><i data-feather="align-left"></i><span>Customers</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a class="@yield('customer_list')" href="{{ route('customer.index') }}"><i class="fa fa-circle"></i>Customer Lists</a></li>
                </ul>
            </li>
            <li class="@yield('users')">
                <a class="sidebar-header @yield('users') " href=""><i data-feather="user-plus"></i><span>Users</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a class="@yield('user_list')" href="{{ route('user.index') }}"><i class="fa fa-circle"></i>User List</a></li>
                    <li><a href="{{ route('user.create') }}"><i class="fa fa-circle"></i>Create User</a></li>
                </ul>
            </li>
            {{-- <li><a class="sidebar-header" href=""><i data-feather="users"></i><span>Vendors</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="list-vendor.html"><i class="fa fa-circle"></i>Vendor List</a></li>
                    <li><a href="create-vendors.html"><i class="fa fa-circle"></i>Create Vendor</a></li>
                </ul>
            </li> --}}
            {{-- <li><a class="sidebar-header" href=""><i data-feather="chrome"></i><span>Localization</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="translations.html"><i class="fa fa-circle"></i>Translations</a></li>
                    <li><a href="currency-rates.html"><i class="fa fa-circle"></i>Currency Rates</a></li>
                    <li><a href="taxes.html"><i class="fa fa-circle"></i>Taxes</a></li>
                </ul>
            </li> --}}
            <li><a class="sidebar-header" href="#"><i data-feather="bar-chart"></i><span>Reports</span></a></li>
            <li class="@yield('settings')">
                <a class="sidebar-header @yield('settings')" href=""><i data-feather="settings" ></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a class="@yield('country')" href="{{ route('country.index') }}"><i class="fa fa-circle"></i>Country</a></li>
                    <li><a class="@yield('city')" href="{{ route('city.index') }}"><i class="fa fa-circle"></i>City</a></li>
                    <li><a class="@yield('area')" href="{{ route('area.index') }}"><i class="fa fa-circle"></i>Area</a></li>
                </ul>
            </li>
            <li class="@yield('web')"><a class="sidebar-header @yield('web')" href=""><i data-feather="settings" ></i><span>Web</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a class="@yield('contact-us')" href="{{ route('contact.index') }}"><i class="fa fa-circle"></i>Contact Us</a></li>
                </ul>
            </li>
            {{-- <li><a class="sidebar-header" href="invoice.html"><i data-feather="archive"></i><span>Invoice</span></a>
            </li> --}}
            <li><a class="sidebar-header" href="#"><i data-feather="log-in"></i><span>Login</span></a>
            </li>
        </ul>
    </div>
</div>
