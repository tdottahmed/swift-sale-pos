<x-layouts.master>
    <x-layouts.widgets_stats/>

    @push('js')
         {{-- widgets_stats  --}}
	<script src="{{asset('limitless/global_assets/js/plugins/ui/ripple.min.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_pages/widgets_stats.js')}}"></script>
    
    {{-- pie --}}
    <!-- Theme JS files -->
	<script src="{{asset('limitless/global_assets/js/plugins/visualization/echarts/echarts.min.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/pies/pie_basic.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/pies/pie_donut.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/pies/pie_nested.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/pies/pie_infographic.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/pies/pie_rose.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/pies/pie_rose_labels.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/pies/pie_levels.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/pies/pie_timeline.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/pies/pie_multiple.js')}}"></script>
	<!-- /theme JS files -->


	<!-- chart JS files -->
	<script src="{{asset('limitless/global_assets/js/plugins/visualization/echarts/echarts.min.js')}}"></script>

	<script src="assets/js/app.js"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/bars/columns_basic.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/bars/columns_stacked.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/bars/columns_thermometer.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/bars/columns_stacked_clustered.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/bars/waterfall_compositive.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/bars/waterfall_change.js')}}"></script>
	<script src="{{asset('limitless/global_assets/js/demo_charts/echarts/light/bars/columns_timeline.js')}}"></script>
	<!-- /theme JS files -->

    @endpush
</x-layouts.master>
