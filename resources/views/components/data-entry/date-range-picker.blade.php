<div class="form-group row align-items-center">
    <div class="col-lg-3">
        <label>Date Range</label>
    </div>
    <div class="col-lg-9">
        <input type="text" name="date_range" class="form-control daterange-predefined" readonly />
    </div>
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
            $('.daterange-predefined').daterangepicker({
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2014',
                    maxDate: '12/31/2019',
                    dateLimit: {
                        days: 60
                    },
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    opens: 'left',
                    applyClass: 'btn-sm btn-primary',
                    cancelClass: 'btn-sm btn-light'
                },
                function(start, end) {
                    // Format the dates in 'YYYY-MM-DD' format
                    let formattedStartDate = start.format('YYYY-MM-DD');
                    let formattedEndDate = end.format('YYYY-MM-DD');

                    // Update the input value with the formatted date range
                    $('.daterange-predefined').val(formattedStartDate + ' - ' + formattedEndDate);

                    $.jGrowl('Date range has been changed', {
                        header: 'Update',
                        theme: 'bg-primary',
                        position: 'center',
                        life: 1500
                    });
                }
            );

            // Set the initial value in the input field to 'YYYY-MM-DD' format
            let initialStartDate = moment().subtract(29, 'days').format('YYYY-MM-DD');
            let initialEndDate = moment().format('YYYY-MM-DD');
            $('.daterange-predefined').val(initialStartDate + ' - ' + initialEndDate);
        });
    </script>
@endpush
