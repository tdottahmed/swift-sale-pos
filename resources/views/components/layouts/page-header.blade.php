<!-- Page header -->
<div class="page-header border-bottom-0">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"><a
                        href="{{ url('/dashboard') }}">Home</a></span> - <x-layouts.page-title /></h4>
            <x-layouts.title />
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
            <div class="btn-group">
                <button type="button" class="btn bg-indigo-400"><i class="icon-plus2 mr-2"></i>Quick Access</button>
                <button type="button" class="btn bg-indigo-400 dropdown-toggle" data-toggle="dropdown"></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header">Quick tools</div>
                    <a href="{{ route('product.create') }}" class="dropdown-item"><i class="icon-plus2"></i>Create
                        Product</a>
                    <a href="{{ route('purchase.create') }}" class="dropdown-item"><i class="icon-plus2"></i>Create
                        Purchase</a>
                    <a href="{{ route('pos.create') }}" class="dropdown-item"><i class="icon-plus2"></i>Create
                        Pos</a>
                    <a href="{{ route('expenses.create') }}" class="dropdown-item"><i class="icon-plus2"></i>Create
                        Expense</a>
                    <a href="{{ route('repair.create') }}" class="dropdown-item"><i class="icon-plus2"></i>Create
                        Repair</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
