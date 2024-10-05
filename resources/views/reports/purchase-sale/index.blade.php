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
                            <h6 class="card-title"> <i class="icon-graph mr-2"></i>Purchse Report</h6>
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
                                        <td>Total Purchases(Amount)</td>
                                        <td>
                                            <x-data-display.amount-display :amount="$purchaseData['total']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Purchse Quantity</td>
                                        <td>{{ $purchaseData['quantity'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Discount</td>
                                        <td>
                                            <x-data-display.amount-display :amount="$purchaseData['total_discount']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Paid Amount</td>
                                        <td>
                                            <x-data-display.amount-display :amount="$purchaseData['paid_amount']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Unpaid Amount</td>
                                        <td>
                                            <x-data-display.amount-display :amount="$purchaseData['unpaid_amount']" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title"> <i class="icon-cash3 mr-2"></i> Sales Report</h6>
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
                                        <td>Total Sales(Amount)</td>
                                        <td>
                                            <x-data-display.amount-display :amount="$saleData['total']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Purchse Quantity</td>
                                        <td>{{ $saleData['quantity'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Discount</td>
                                        <td>
                                            <x-data-display.amount-display :amount="$saleData['total_discount']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Paid Amount</td>
                                        <td>
                                            <x-data-display.amount-display :amount="$saleData['paid_amount']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>walking Customer Sales</td>
                                        <td>
                                            <x-data-display.amount-display :amount="$saleData['walking_customer']" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.master>
