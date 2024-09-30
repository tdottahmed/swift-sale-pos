<x-layouts.master>
    <form action="{{ route('dashboard') }}" method="get">
        @csrf
        <div class="row">
            <div class="col-lg-9">
                <x-data-entry.date-range-picker />
            </div>
            <div class="col-lg-3">
                <button class="btn bg-teal-400 shadow-2"> <i class="icon-filter4 mr-2"></i> Filter</button>
                <a href="{{ route('dashboard') }}" class="btn bg-danger-400 shadow-2"> <i class="icon-undo2 mr-2"></i>
                    Reset</a>
            </div>
        </div>
    </form>
    @include('dashboard.partials.widgets', compact('widgetData'))
    @include('dashboard.partials.charts', compact('chartData'))
</x-layouts.master>
