<x-layouts.head />

<body class="navbar-top">
    <!-- Page content -->

    {{ $slot }}
    <!--Modal Component -->
    <x-data-display.modal id="ajaxModal" title="" headerColor="" />
    <!--/Modal Component -->
    <!-- Page content -->
    <script src="{{ asset('limitless/global_assets/js/custom.js') }}"></script>

    @stack('scripts')
</body>

</html>
