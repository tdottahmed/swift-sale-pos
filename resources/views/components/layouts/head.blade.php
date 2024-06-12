<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <x-layouts.title/>
    <link rel="shortcut icon" href="{{asset('shopping.png')}}">
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless/' . $mode . '/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/' . $mode . '/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/' . $mode . '/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/' . $mode . '/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/' . $mode . '/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link src="{{ asset('limitless/global_assets/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">

    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('limitless/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('limitless/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

    <script src="{{ asset('limitless/' . $mode . '/assets/js/app.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_charts/pages/dashboard/dark/streamgraph.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_charts/pages/dashboard/dark/sparklines.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_charts/pages/dashboard/dark/lines.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_charts/pages/dashboard/dark/areas.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_charts/pages/dashboard/dark/donuts.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_charts/pages/dashboard/dark/bars.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_charts/pages/dashboard/dark/progress.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_charts/pages/dashboard/dark/heatmaps.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_charts/pages/dashboard/dark/pies.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_charts/pages/dashboard/dark/bullets.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('limitless/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
	<script src="{{ asset('limitless/global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script src="{{ asset('limitless/global_assets/js/demo_pages/form_select2.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_pages/datatables_basic.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/forms/styling/switch.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_pages/form_checkboxes_radios.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/notifications/jgrowl.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/notifications/noty.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_pages/extra_jgrowl_noty.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_pages/components_modals.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/media/fancybox.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_pages/ecommerce_product_list.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_pages/uploader_bootstrap.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/pagination/bs_pagination.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_pages/components_pagination.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('datetime/datetimepicker.css') }}">
    <script src="{{ asset('datetime/datetimepicker.js') }}"></script>


   


    <script>
        $(document).ready(function(){
            $('#starts_at').datetimepicker({
                format:'Y-m-d H:i:s',
            });

            $('#expires_at').datetimepicker({
                format:'Y-m-d H:i:s',
            });
        });
    </script>

    <style>
		.navbar-brand img {
			height: 35px !important;
			display: block;
            margin-left: 25px;
		}
    </style>
    <style>
        /* Loader styles */
        #loader-wrapper {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #loader {
            border: 5px solid #f3f3f3; /* Light grey */
            border-top: 5px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

    </style>
    <!-- /theme JS files -->

    @stack('css')
    @stack('js')

	
</head>
