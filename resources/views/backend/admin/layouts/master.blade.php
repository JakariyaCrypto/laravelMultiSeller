    <!-- header Panel -->
    @include('backend/admin/layouts/partials/header')
    <!-- /#header-panel -->

    <!-- Left Panel -->
    @include('backend/admin/layouts/partials/sidebar')
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header--> 
        @include('backend/admin/layouts/partials/page-header')
        <!-- Header-->

        @yield('content')
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- footer Panel -->
    @include('backend/admin/layouts/partials/footer')
    <!-- /#footer-panel -->

    @yield('script')


    </body>

</html>