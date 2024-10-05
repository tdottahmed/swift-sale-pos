<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Insert Your Category Info') }}
        </x-slot>
        <x-slot name="body">
            <form method="POST" action="{{ route('purchase.store') }}" accept-charset="UTF-8" id="purchase-form"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="itemqty" id="inputitemqty">
                <input type="hidden" name="total" id="inputtotal">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-data-entry.input type="date" name="date" attribute="required" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-data-entry.select name="branch_id" label="Select Branch" :options="$branches"
                                class="select select-search" attribute="required" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="supplier" label="Select Supplier" :options="$allSuppliers"
                            :createRoute="route('supplier.create')" createLabel="Create Supplier" attribute="required" />
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Purchase Status <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select name="status" class="form-control select" required>
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
                            <x-data-entry.input type="file" name="document" label="Attach Document" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <x-data-entry.input type="number" name="shipping_cost" attribute="required" value="0" />
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

                                </tbody>
                                <tfoot class="tfoot active">
                                    <th colspan="2">Total</th>
                                    <th>
                                        <span id="totalQty"></span>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th id="total-discount">0.00</th>
                                    <th id="total-tax">0.00</th>
                                    <th>
                                        <span id="totalAmount"></span>
                                    </th>
                                    <th><i class="dripicons-trash"></i></th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Order Tax</label>
                            <select class="form-control select" name="order_tax_rate">
                                <option value="0">No Tax</option>
                                <option value="10">@10</option>
                                <option value="15">@15</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>
                                <strong>Discount</strong>
                            </label>
                            <input type="number" name="order_discount" class="form-control" step="any" />
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
                calculateTotals();
                $('#productSearch').on('keyup', function() {
                    let query = $(this).val();
                    if (query.length > 1) {
                        $.ajax({
                            url: "{{ route('product.search') }}",
                            method: 'GET',
                            data: {
                                q: query
                            },
                            success: function(data) {
                                $('#productList').empty().show();
                                if (data.length > 0) {
                                    $.each(data, function(index, product) {
                                        if (product.product_type == 'variable') {
                                            productPurchasePrice = product.variations[0]
                                                .purchase_exc;
                                        } else {
                                            productPurchasePrice = product
                                                .purchase_price_excluding_tax;
                                        }
                                        $('#productList').append(
                                            `<li class="list-group-item" 
                                            data-id="${product.id}"
                                            data-purchasePrice="${productPurchasePrice}"
                                            data-name="${product.name}" 
                                            data-sku="${product.sku}">${product.name} - ${product.sku}</li>`
                                        );
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

                $(document).on('click', '#productList li', function() {
                    const product = {
                        id: $(this).data('id'),
                        name: $(this).data('name'),
                        sku: $(this).data('sku'),
                        purchasePrice: $(this).data('purchaseprice')
                    };
                    generateItem(product);
                    $('#productList').hide();
                    $('#productSearch').val('');
                });

                function generateItem(product) {

                    let itemtr = `<tr>
                        <input type="hidden" name="product_id[]" value="${product.id}" />
                        <input type="hidden" name="product_name[]" value="${product.name}" />
                        <input type="hidden" name="product_sku[]" value="${product.sku}" />
                        <td colspan="2">
                            <span class="product-name text-bold text-indigo">${product.name} (${product.sku})</span>
                        </td>
                        <td>
                            <input type="number" class="styled-input small-input styled-number-input qty" name="qty[]" value="1" />
                        </td>
                        <td>
                            <input type="number" class="styled-input small-input styled-number-input received" name="received[]" value="1" />
                        </td>
                        <td>
                            <input type="number" class="styled-input small-input styled-number-input unit-cost" name="unit_cost[]" value="${product.purchasePrice}" />
                        </td>
                        <td>
                            <input type="number" class="styled-input small-input styled-number-input discount" name="discount[]" value="0" />
                        </td>
                        <td>
                            <input type="number" class="styled-input small-input styled-number-input tax" name="tax[]" value="5" />
                        </td>
                        <td>
                            <input type="text" class="styled-input small-input styled-number-input sub-total" name="sub_total[]" value="${product.purchasePrice}" readonly/>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" type="button" onclick="removeItem(this)">
                                <i class="icon-cross"></i>
                            </button>
                        </td>
                    </tr>`;
                    $('#orderMultipleEntry').append(itemtr);
                    calculateTotals();
                }

                $(document).on('input', '.qty, .unit-cost, .discount, .tax', function() {
                    updateSubtotal($(this).closest('tr'));
                    calculateTotals();
                });
            });

            function removeItem(element) {
                $(element).closest('tr').remove();
                calculateTotals();
            }

            function calculateTotals() {
                let totalQty = 0;
                let totalAmount = 0;
                $('#orderMultipleEntry tr').each(function() {
                    let qty = parseFloat($(this).find('.qty').val()) || 0;
                    let subTotal = parseFloat($(this).find('.sub-total').val()) || 0;
                    totalQty += qty;
                    totalAmount += subTotal;
                });
                $('#totalQty').text(totalQty);
                $('#inputitemqty').val(totalQty);
                $('#inputtotal').val(totalAmount.toFixed(2));
                $('#totalAmount').text(totalAmount.toFixed(2));
            }

            function updateSubtotal(row) {
                let qty = parseFloat(row.find('.qty').val()) || 0;
                let unitCost = parseFloat(row.find('.unit-cost').val()) || 0;
                let discount = parseFloat(row.find('.discount').val()) || 0;
                let tax = parseFloat(row.find('.tax').val()) || 0;

                let subTotal = (qty * unitCost) - discount + (qty * unitCost * (tax / 100));
                row.find('.sub-total').val(subTotal.toFixed(2));
            }
        </script>
    @endpush

    @include('purchase.partials.custom-input')
</x-layouts.master>
