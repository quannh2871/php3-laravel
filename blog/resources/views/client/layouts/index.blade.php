<!DOCTYPE html>
<html lang="en">
@include('client.layouts.style')

<body class="mobile_nav_class jl-has-sidebar">
    <div class="options_layout_wrapper jl_radius jl_none_box_styles jl_border_radiuss">
        <div class="options_layout_container full_layout_enable_front">
            <!-- Start header -->
            @include('client.layouts.header')
            <!-- end header -->
            @include('client.layouts.navbar')
            <div class="mobile_menu_overlay"></div>
            @yield('content')
            <!-- Start footer -->
            @include('client.layouts.footer')
            <!-- End footer -->
        </div>
    </div>
    <div id="go-top"><a href="#go-top"><i class="fa fa-angle-up"></i></a>
    </div>
    @include('client.layouts.script')
</body>


<!-- Mirrored from jellywp.com/disto-preview/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Aug 2020 09:29:54 GMT -->

</html>
