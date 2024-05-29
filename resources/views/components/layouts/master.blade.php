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
				<x-loader/>
            <div class="content pt-0">
                {{$slot}}
            </div>
            <!-- Footer -->
			<x-layouts.footer/>
			<!-- /footer -->
		</div>
        <!-- Main content -->		
		  <div id="loader" style="display: none;">
			Loading...
		</div>
		
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
	<script>
		$(document).ready(function() {
			 $('#overlay').show(); // Show the loader when the document is ready

			 // Hide the loader when the content is fully loaded
			 $(window).on('load', function() {
				  $('#overlay').hide();
			 });
		});
  </script>

  {{-- <script>
	$("#shippingForm").submit(function(event){
		event.preventDefault();
		var elemet = $(this);
		$("button[type=submit]").prop('disabled',true);
		$.ajax({
			type: 'post',
			url: '{{ route("shipping.store") }}',
			data: elemet.serializeArray(),
			dataType: 'json',
			success: function (response) {
				$("button[type=submit]").prop('disabled', false);

				if(response["status"] == true){
					window.location.herf = "{{ route('shipping.create')}}";
					
				}else{
					var errors = response['errors'];
					if(errors['country']){
					$("#country").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['country']);
				  }else{
					$("#country").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback').html("");
				  }

					


					if(errors['amount']){
					$("#amount").addClass('is-invalid')
					.siblings('p')
					.addClass('invalid-feedback').html(errors['amount']);
					}else{
					$("#amount").removeClass('is-invalid')
					.siblings('p')
					.removeClass('invalid-feedback').html("");
					}
					
				}
			}
		});
	})
  </script> --}}

  <script>
	$("#shippingForm").submit(function(event){
    event.preventDefault();
    var element = $(this);
    $("button[type=submit]").prop('disabled', true);
    $.ajax({
        type: 'post',
        url: '{{ route("shipping.store") }}',
        data: element.serializeArray(),
        dataType: 'json',
        success: function (response) {
            $("button[type=submit]").prop('disabled', false);

            if (response.status == true) {
                window.location.href = response.redirect; // Redirect to the index page
            } else {
                var errors = response.errors;
                if (errors.country) {
                    $("#country").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors.country);
                } else {
                    $("#country").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                }

                if (errors.amount) {
                    $("#amount").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors.amount);
                } else {
                    $("#amount").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                }
            }
        }
    });
});

  </script>

  {{-- <script>
	$("#updateShippingForm").submit(function(event){
    event.preventDefault();
    var element = $(this);
    $("button[type=submit]").prop('disabled', true);
    $.ajax({
        type: 'post',
        url: element.attr('action'),
        data: element.serializeArray(),
        dataType: 'json',
        success: function (response) {
            $("button[type=submit]").prop('disabled', false);

            if (response.status == true) {
                window.location.href = response.redirect; 
            } else {
                var errors = response.errors;
                if (errors.country) {
                    $("#country").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors.country);
                } else {
                    $("#country").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                }

                if (errors.amount) {
                    $("#amount").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback').html(errors.amount);
                } else {
                    $("#amount").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");
                }
            }
        }
    });
});

  </script> --}}

  <script>
	$(document).ready(function() {
    $("#updateShippingForm").submit(function(event){
        event.preventDefault();
        var element = $(this);
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            type: 'POST',
            url: element.attr('action'),  
            data: element.serializeArray(),
            dataType: 'json',
            success: function (response) {
                $("button[type=submit]").prop('disabled', false);

                if (response.status === true) {
                    window.location.href = response.redirect;  
                } else {
                    var errors = response.errors;
                    if (errors.country) {
                        $("#country").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors.country);
                    } else {
                        $("#country").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                    }

                    if (errors.amount) {
                        $("#amount").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors.amount);
                    } else {
                        $("#amount").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                    }
                }
            }
        });
    });
});

  </script>
	@stack('scripts')
</body>
</html>
