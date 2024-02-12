<x-layouts.head/>

<body>

	<!-- Main navbar -->
	<x-layouts.header/>
	<!-- /main navbar -->

					
	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<x-layouts.sidebar/>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">
            <!-- Page header -->
			<x-layouts.page-header/>
			<!-- /page header -->

            <div class="content pt-0">
                {{$slot}}
            </div>
            <!-- Footer -->
			<x-layouts.footer/>
			<!-- /footer -->
		</div>
        <!-- Main content -->			
	</div>
		<!-- /main content -->

	<!-- /page content -->

</body>
</html>
