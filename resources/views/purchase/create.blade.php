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
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control date"
                                        placeholder="Choose date" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Branch *</label>
                                    <select required name="branch_id" class="selectpicker form-control"
                                        data-live-search="true" title="Select branch...">
                                        <option value="1">Shop 1</option>
                                        <option value="2">Shop 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select name="supplier_id" class="selectpicker form-control" data-live-search="true"
                                        title="Select supplier...">
                                        <option value="1">Abdullah (Global Tech)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Purchase Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Received</option>
                                        <option value="2">Partial</option>
                                        <option value="3">Pending</option>
                                        <option value="4">Ordered</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Attach Document</label>
                                    <input type="file" name="document" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Currency *</label>
                                    <select name="currency_id" id="currency-id" class="form-control selectpicker">
                                        <option value="1" checked>TK</option>
                                        <option value="2" >USD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-0">
                                    <label>Exchange Rate *</label>
                                </div>
                                <div class="form-group d-flex">
                                    <input class="form-control" type="text" id="exchange_rate" name="exchange_rate">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Select Product</label>
                                <div class="search-box input-group">
                                    <input type="text" name="product_code_name" id="lims_productcodeSearch"
                                        placeholder="Please type product code and select..." class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h5>Order Table *</h5>
                                <div class="table-responsive mt-3">
                                    <table id="myTable" class="table table-hover order-list">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Quantity</th>
                                                <th class="recieved-product-qty d-none">Received</th>
                                                <th>Net Unit Cost</th>
                                                <th>Discount</th>
                                                <th>Tax</th>
                                                <th>SubTotal</th>
                                                <th><i class="dripicons-trash"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot class="tfoot active">
                                            <th colspan="2">Total</th>
                                            <th id="total-qty">0</th>
                                            <th class="recieved-product-qty d-none"></th>
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
                                    <input type="number" name="order_discount" class="form-control"
                                        step="any" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>
                                        <strong>Shipping Cost</strong>
                                    </label>
                                    <input type="number" name="shipping_cost" class="form-control"
                                        step="any" />
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
        <table class="table table-bordered table-condensed totals">
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
</x-layouts.master>
