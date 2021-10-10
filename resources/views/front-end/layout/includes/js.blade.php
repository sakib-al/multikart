  <!-- latest jquery-->
  <script src="{{ asset('front-end/assets/js/jquery-3.3.1.min.js') }}"></script>

  <!-- menu js-->
  <script src="{{ asset('front-end/assets/js/menu.js') }}"></script>

  <!-- lazyload js-->
  <script src="{{ asset('front-end/assets/js/lazysizes.min.js') }}"></script>

  <!-- price range js -->
  <script src="{{ asset('front-end/assets/js/price-range.js') }}"></script>

  <!-- slick js-->
  <script src="{{ asset('front-end/assets/js/slick.js') }}"></script>

  <!-- Bootstrap js-->
  <script src="{{ asset('front-end/assets/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Bootstrap Notification js-->
  <script src="{{ asset('front-end/assets/js/bootstrap-notify.min.js') }}"></script>

  <!-- Theme js-->
  <script src="{{ asset('front-end/assets/js/script.js') }}"></script>

 {{-- Toaster --}}
 <script src="{{ asset('back-end/assets/js/toastr.min.js') }}"></script>

 <script>
     /* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "380px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
 </script>

  @stack('custom_js')
