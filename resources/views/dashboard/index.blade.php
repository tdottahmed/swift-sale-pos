<x-layouts.master>
    <div class="row justify-content-between">
        <div class="col-lg-7">
            <form action="{{ route('dashboard') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <x-data-entry.date-range-picker />
                    </div>
                    <div class="col-lg-6">
                        <button class="btn bg-teal-400 shadow-2"> <i class="icon-filter4 mr-2"></i> Filter</button>
                        <a href="{{ route('dashboard') }}" class="btn bg-danger-400 shadow-2"> <i
                                class="icon-undo2 mr-2"></i>
                            Reset</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-2">
            <div class="header-elements text-right mb-3 mb-md-0">
                <div class="btn-group">
                    <button type="button" class="btn bg-teal-800"><i class="icon-stack2 mr-2"></i> view
                        report</button>
                    <button type="button" class="btn bg-teal-800 dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">Actions</div>
                        <a href="{{ route('reports.profitLoss') }}" class="dropdown-item"><i
                                class="icon-file-eye"></i>Profit or loss</a>
                        <a href="{{ route('reports.inventory') }}" class="dropdown-item"><i
                                class="icon-file-eye"></i>Inventory</a>
                        <a href="{{ route('reports.expense') }}" class="dropdown-item"><i
                                class="icon-file-eye"></i>Expense</a>
                        <a href="{{ route('reports.purchaseSale') }}" class="dropdown-item"><i
                                class="icon-file-eye"></i>Purchase and Sale</a>
                        <a href="{{ route('reports.trending-products') }}" class="dropdown-item"><i
                                class="icon-file-eye"></i>Trending Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.partials.widgets', compact('widgetData'))
    @include('dashboard.partials.charts', compact('chartData'))
</x-layouts.master>
