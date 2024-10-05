<x-layouts.head />

<body>

    <!-- Main navbar -->
    <x-layouts.header />
    <!-- /main navbar -->

    <x-calculator />

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <x-layouts.sidebar />
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">
            <x-layouts.page-header />

            <div class="content pt-0">
                <!-- Content area -->
                <div class="content">
                    {{ $slot }}
                </div>
                <!-- /content area -->

            </div>

            <!--Modal Component -->
            <x-data-display.modal id="ajaxModal" title="" headerColor="" />
            <!--/Modal Component -->

            <!-- Footer -->
            <x-layouts.footer />
            <!-- /footer -->
        </div>
        <!-- Main content -->

    </div>
    <!-- /main content -->

    <!-- /page content -->
    <script src="{{ asset('limitless/global_assets/js/custom.js') }}"></script>
    <x-data-display.alerts />
    @stack('scripts')
</body>

</html>
