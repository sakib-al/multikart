<ul>
    <li class="@yield('dashboard_account')"><a href="{{ route('user.dashboard') }}">Account Info</a></li>
    <li class="@yield('dashboard_address')"><a href="{{ route('user.address') }}">Address Book</a></li>
    <li class="@yield('dashboard_order')"><a href="{{ route('user.order') }}">My Orders</a></li>
    <li class="@yield('dashboard_wishlist')"><a href="#">My Wishlist</a></li>
    <li class="@yield('dashboard_password')"><a href="{{ route('user.password.change') }}">Change Password</a></li>
    <li class="last"><a href="#">Log Out</a></li>
</ul>
