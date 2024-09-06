<x-layouts.master>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Purchse and Sale</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <x-data-display.card-toolbar />
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title"> <i class="icon-graph mr-2"></i>Purchse and Sale</h6>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Total Purchases</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Total Sales</td>
                                        <td>Rs. 0</td>
                                    </tr>
                                    <tr>
                                        <td>Sale return</td>
                                        <td>Rs. 0</td>
                                    </tr>
                                    <tr>
                                        <td>Purchase Return</td>
                                        <td>Rs. 0</td>
                                    </tr>
                                    <tr>
                                        <td>Total Expenses</td>
                                        <td>Rs. 0</td>
                                    </tr>
                                    <tr>
                                        <td>Total Payroll</td>
                                        <td>Rs. 0</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <td><strong>Profit</strong></td>
                                        <td><strong>Rs. 0</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title"> <i class="icon-cash3 mr-2"></i> Net Profit / Net Loss</h6>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3>COGS: $ -21,606.00</h3>
                            <small>Cost of Goods Sold = Starting inventory(opening stock) + purchases − ending
                                inventory(closing stock)</small>
                            <hr>
                            <h3>Gross Profit: $ 6,226.50</h3>
                            <small>(Total sell price - Total purchase price) + Hms Total + Project Invoice</small>
                            <hr>
                            <h3>Net Profit: $ 3,713.25</h3>
                            <small>Gross Profit + (Total sell shipping charge + Sell additional expenses + Total Stock
                                Recovered + Total Purchase discount + Total sell round off + Hms Total )
                                - ( Total Stock Adjustment + Total Expense + Total purchase shipping charge + Total
                                transfer shipping charge + Purchase additional expenses + Total Sell discount + Total
                                customer reward + Total Payroll + Total Production Cost )</small>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                <li class="nav-item">
                    <a href="#profitByProduct" class="nav-link active" data-toggle="tab"
                        data-url="{{ route('reports.profit-by-product') }}">
                        <i class="icon-cart mr-2"></i> Purchase
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profitByCategories" class="nav-link" data-toggle="tab"
                        data-url="{{ route('reports.profit-by-category') }}">
                        <i class="icon-list mr-2"></i> Sale
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profitByBrands" class="nav-link" data-toggle="tab"
                        data-url="{{ route('reports.profit-by-brand') }}">
                        <i class="icon-package mr-2"></i> Product Purchase Report
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profitByDay" class="nav-link" data-toggle="tab"
                        data-url="{{ route('reports.profit-by-day') }}">
                        <i class="icon-calendar mr-2"></i> Product Sale Report
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="profitByProduct"></div>
                <div class="tab-pane fade" id="profitByCategories"></div>
                <div class="tab-pane fade" id="profitByBrands"></div>
                <div class="tab-pane fade" id="profitByDay"></div>
                <div class="tab-pane fade" id="profitByCustomer"></div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                    var target = $(e.target).attr("href");
                    var url = $(e.target).data("url");
                    if ($(target).is(':empty')) {
                        $.ajax({
                            url: url,
                            method: 'GET',
                            success: function(data) {
                                $(target).html(data);
                            },
                            error: function() {
                                $(target).html('<p>Error loading content</p>');
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
</x-layouts.master>
