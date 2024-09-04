<div class="form-group">
    <label class="d-block">Select Date Range:</label>
    <input type="text" class="form-control daterange-predefined" readonly />
</div>

@push('scripts')
<!-- Theme JS files -->
<script src="{{ asset('limitless/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
<script src="{{ asset('limitless/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
<script src="{{ asset('limitless/global_assets/js/plugins/pickers/anytime.min.js') }}"></script>
<script src="{{ asset('limitless/global_assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('limitless/global_assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('limitless/global_assets/js/plugins/pickers/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('limitless/global_assets/js/plugins/pickers/pickadate/legacy.js') }}"></script>
<script src="{{ asset('limitless/global_assets/js/plugins/notifications/jgrowl.min.js') }}"></script>

<script src="{{ asset('limitless/global_assets/js/demo_pages/picker_date.js') }}"></script>
<!-- /theme JS files -->

<script>
    $(document).ready(function() {
        $('.daterange-predefined').daterangepicker(
            {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2014',
                maxDate: '12/31/2019',
                dateLimit: { days: 60 },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                applyClass: 'btn-sm btn-primary',
                cancelClass: 'btn-sm btn-light'
            },
            function(start, end) {
                $('.daterange-predefined').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                $.jGrowl('Date range has been changed', { header: 'Update', theme: 'bg-primary', position: 'center', life: 1500 });
            }
        );

        // Set the initial value in the input field
        $('.daterange-predefined').val(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
    });
</script>

@endpush