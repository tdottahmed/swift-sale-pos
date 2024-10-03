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
                            <small></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.master>
