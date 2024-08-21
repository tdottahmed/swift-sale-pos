<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Insert Your Category Info') }}
        </x-slot>
        <x-slot name="body">
            <form method="POST" action="{{ route('purchase.store') }}" accept-charset="UTF-8" id="purchase-form"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-data-entry.input type="date" name="date" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-data-entry.select name="branch_id" label="Select Branch" :options="$branches"
                                class="select select-search" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="supplier" label="Select Supplier" :options="$allSuppliers"
                            :createRoute="route('supplier.create')" createLabel="Create Supplier" />
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Purchase Status</label>
                            <div class="col-lg-9">
                                <select name="status" class="form-control select">
                                    <option value="recieved">Received</option>
                                    <option value="partial">Partial</option>
                                    <option value="pending">Pending</option>
                                    <option value="ordered">Ordered</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-data-entry.input type="file" name="document" label="Attche Document" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <x-data-entry.input type="number" name="shipping_cost" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="form-group position-relative">
                            <input type="text" id="productSearch" class="form-control"
                                placeholder="Search for products...">
                            <ul id="productList" class="list-group position-absolute"
                                style="z-index: 1000; width: 100%; display: none;">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h5>Order Table *</h5>
                        <div class="table table-responsive mt-3">
                            <table id="myTable" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2">Name</th>
                                        <th>Code</th>
                                        <th>Quantity</th>
                                        <th>Received</th>
                                        <th>Net Unit Cost</th>
                                        <th>Discount</th>
                                        <th>Tax</th>
                                        <th>SubTotal</th>
                                        <th><i class="dripicons-trash"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="orderMultipleEntry">
                                    <tr>
                                        <td colspan="2">
                                            <input type="text" class="form-control" name="product_name" readonly
                                                value="Test" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="product_code" readonly
                                                value="test" />
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="qty" value="1" />
                                        </td>
                                        <td>
                                            <input type="number" class="form-control recieved" name="recieved">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="unit_cost"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="discount" value="0" />
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="tax" value="5">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control sub-total" name="sub_total">
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" type="button"><i
                                                    class="icon-cross"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="tfoot active">
                                    <th colspan="3">Total</th>
                                    <th id="total-qty">0</th>
                                    <th></th>
                                    <th></th>
                                    <th id="total-discount">0.00</th>
                                    <th id="total-tax">0.00</th>
                                    <th id="total">0.00</th>
                                    <th><i class="dripicons-trash"></i></th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="hidden" name="total_qty" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="hidden" name="total_discount" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="hidden" name="total_tax" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="hidden" name="total_cost" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="hidden" name="item" />
                            <input type="hidden" name="order_tax" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="hidden" name="grand_total" />
                            <input type="hidden" name="paid_amount" value="0.00" />
                            <input type="hidden" name="payment_status" value="1" />
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Order Tax</label>
                            <select class="form-control" name="order_tax_rate">
                                <option value="0">No Tax</option>
                                <option value="10">@10</option>
                                <option value="15">@15</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>
                                <strong>Discount</strong>
                            </label>
                            <input type="number" name="order_discount" class="form-control" step="any" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>
                                <strong>Shipping Cost</strong>
                            </label>
                            <input type="number" name="shipping_cost" class="form-control" step="any" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Note</label>
                            <textarea rows="5" class="form-control" name="note"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i
                                class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1"></i>{{ __('Submit') }}</button>
                    </div>
                </div>

            </form>
            <div class="container-fluid mt-3">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <td><strong>Items</strong>
                                <span class="pull-right" id="item">0.00</span>
                            </td>
                            <td><strong>Total</strong>
                                <span class="pull-right" id="subtotal">0.00</span>
                            </td>
                            <td><strong>Order Tax</strong>
                                <span class="pull-right" id="order_tax">0.00</span>
                            </td>
                            <td><strong>Order Discount</strong>
                                <span class="pull-right" id="order_discount">0.00</span>
                            </td>
                            <td><strong>Shipping Cost</strong>
                                <span class="pull-right" id="shipping_cost">0.00</span>
                            </td>
                            <td><strong>Grand Total</strong>
                                <span class="pull-right" id="grand_total">0.00</span>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('purchase.index') }}"
                class="btn 
            btn-sm bg-indigo 
            border-2 
            border-indigo 
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"><i
                    class="icon-list"></i></a>
        </x-slot>
    </x-data-display.card>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#productSearch').on('keyup', function() {

                    let query = $(this).val();
                    console.log(query);


                    if (query.length > 1) {
                        $.ajax({
                            url: "{{ route('product.search') }}",
                            method: 'GET',
                            data: {
                                q: query
                            },
                            success: function(data) {
                                console.log(data);

                                $('#productList').empty().show();

                                if (data.length > 0) {
                                    $.each(data, function(index, product) {
                                        $('#productList').append(
                                            '<li class="list-group-item" data-id="' +
                                            product.id + '">' + product.name + ' - ' +
                                            product.sku + '</li>');
                                    });
                                } else {
                                    $('#productList').hide();
                                }
                            }
                        });
                    } else {
                        $('#productList').hide();
                    }
                });

                // Handle item selection
                $(document).on('click', '#productList li', function() {
                    generateitem();
                    $('#productList').hide();
                });

                // Hide the list if clicked outside
                $(document).click(function(e) {
                    if (!$(e.target).closest('#productSearch, #productList').length) {
                        $('#productList').hide();
                    }
                });

                function generateitem(product) {
                    // let item = product.name + ' - ' + product.sku;
                    let itemtr = `<tr>
                                        <td colspan="2">
                                            <input type="text" class="form-control" name="product_name" readonly
                                                value="Test" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="product_code" readonly
                                                value="test" />
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="qty" value="1" />
                                        </td>
                                        <td>
                                            <input type="number" class="form-control recieved" name="recieved">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="unit_cost"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="discount" value="0" />
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="tax" value="5">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control sub-total" name="sub_total">
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm" type="button"><i
                                                    class="icon-cross"></i></button>
                                        </td>
                                    </tr>`;

                    $('#orderMultipleEntry').append(itemtr);
                }
            });
        </script>
    @endpush
    @push('css')
        <style>
            #productList {
                max-height: 200px;
                overflow-y: auto;
                cursor: pointer;
            }

            #productList li {
                padding: 10px;
                border: 1px solid #ddd;
            }

            #productList li:hover {
                background-color: #2d4cf7;
                color: #ddd;
            }
        </style>
    @endpush
</x-layouts.master>
