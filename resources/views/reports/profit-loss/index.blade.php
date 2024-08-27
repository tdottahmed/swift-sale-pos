<x-layouts.master>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Profit or loss</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="toolbar">
                <ul class="nav nav-pills ">
                    <li><a href="#" type="button"
                            class="btn btn-outline bg-pink-400 text-pink-400 border-pink-400 "><i
                                class="icon-file-pdf mr-2"></i> Export PDF</a>
                    </li>
                    <li><a href="#" type="button"
                            class="btn btn-outline bg-indigo-400 text-indigo-400 border-indigo-400 mx-2"><i
                                class="icon-file-excel mr-2"></i> Export Excel</a>
                    </li>
                    <li><a href="#" type="button"
                            class="btn btn-outline bg-slate-400 text-slate-400 border-slate-400 "><i
                                class="icon-file mr-2"></i> Export CSV</a>
                    </li>

                </ul>
            </div>
            <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                <li class="nav-item"><a href="#profitByProduct" class="nav-link active" data-toggle="tab">Profit By
                        Product</a></li>
                <li class="nav-item"><a href="#profitByCategories" class="nav-link" data-toggle="tab">Profif By
                        Category</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu dropdown-menu-right" x-placement="top-end"
                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(158px, 1px, 0px);">
                        <a href="#highlighted-justified-tab3" class="dropdown-item" data-toggle="tab">Dropdown tab</a>
                        <a href="#highlighted-justified-tab4" class="dropdown-item" data-toggle="tab">Another tab</a>
                    </div>
                </li>
            </ul>

            <div class="tab-content">
                @include('reports.profit-loss.partials.by-product')
                @include('reports.profit-loss.partials.by-category')

                <div class="tab-pane fade active" id="highlighted-justified-tab4">
                    Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                </div>
                <div class="tab-pane fade active" id="highlighted-justified-tab3">
                    Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                </div>

            </div>
        </div>
    </div>
</x-layouts.master>
