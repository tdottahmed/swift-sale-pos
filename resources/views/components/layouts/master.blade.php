<x-layouts.head/>

<body>

	<!-- Main navbar -->
	<x-layouts.header/>
	<!-- /main navbar -->

	<x-calculator/>
					
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

	@if(session('success'))
	<script>
		 $(document).ready(function() {
			  new Noty({
					theme: 'alert alert-success alert-styled-left p-0 bg-success',
					text: "{{ session('success') }}",
					type: 'success',
					progressBar: true,
					closeWith: ['button']
			  }).show();
		 });
	</script>
	@endif
	@if(session('error'))
	<script>
		 $(document).ready(function() {
			  new Noty({
					theme: 'alert alert-danger alert-styled-left p-0 bg-danger',
					text: "{{ session('error') }}",
					type: 'error',
					progressBar: true,
					closeWith: ['button']
			  }).show();
		 });
	</script>
	@endif
	@if(session('info'))
	<script>
		 $(document).ready(function() {
			  new Noty({
					theme: 'alert alert-info alert-styled-left p-0 bg-info',
					text: "{{ session('info') }}",
					type: 'info',
					progressBar: true,
					closeWith: ['button']
			  }).show();
		 });
	</script>
	@endif
	@if(session('warning'))
	<script>
		 $(document).ready(function() {
			  new Noty({
					theme: 'alert alert-warning alert-styled-left p-0 bg-warning',
					text: "{{ session('warning') }}",
					type: 'warning',
					progressBar: true,
					closeWith: ['button']
			  }).show();
		 });
	</script>
	@endif
	@stack('scripts')
</body>
</html>
