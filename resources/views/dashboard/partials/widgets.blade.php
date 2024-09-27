<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-cart-remove icon-3x text-success-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{ number_format($widgetData['totalSales']) }}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Total Sales(Amount)</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="icon-basket icon-3x text-indigo-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{ number_format($widgetData['totalPurchase']) }}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Total Purchase(Amount)</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="media-body">
                    <h3 class="font-weight-semibold mb-0">{{ number_format($widgetData['totalExpense']) }}</h3>
                    <span class="text-uppercase font-size-sm text-muted">total Expense(Amount)</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-wallet icon-3x text-blue-400"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body">
            <div class="media">
                <div class="media-body">
                    <h3 class="font-weight-semibold mb-0">{{ number_format($widgetData['totalProducts']) }}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Total Products</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-bag icon-3x text-danger-400"></i>
                </div>
            </div>
        </div>
    </div>
</div>
