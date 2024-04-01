<x-layouts.master>
    @include('expense.create-modal',compact('expenseCategories'))
    @include('pos.discount')
    <div class="row w-full">
       <div class="card">
        <div class="card-body">
            <span class="col-lg-2 "><kbd>Shift + W</kbd> Select Customer</span>
            <span class="col-lg-2 "><kbd>Shift + A</kbd> Create new Customer</span>
            <span class="col-lg-2 "><kbd>Shift + C</kbd> Close Selected Dropdown</span>
            <span class="col-lg-2 "><kbd>Shift + Z</kbd> Category Wise Product</span>
            <span class="col-lg-2 "><kbd>Shift + B</kbd> Brand Wise Product</span>
            <span class="col-lg-2 "><kbd>Shift + S</kbd> Complete Order</span>
           </div>           
        </div>
    </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <button class="btn btn-sm bg-blue-800 mx-2"><i class="icon icon-plus2 mr-2" ></i>Note</button>
                        <button class="btn btn-sm bg-indigo-800 mx-2" data-toggle="modal" data-target="#createExpense"><i class="icon icon-plus2 mr-2" ></i>Expense</button>
                        <button class="btn btn-sm bg-teal-800 mx-2"><i class="icon icon-wrench3 mr-2" ></i>Repair</button>
                        <button class="btn btn-sm bg-danger-800 mx-2"><i class="icon icon-reset mr-2" ></i>Return</button>
                        <button class="btn btn-sm bg-info-800 mx-2"><i class="icon icon-pause mr-2" ></i>suspended</button>
                        <button class="btn btn-sm bg-success-800 mx-2"><i class="icon icon-portfolio mr-2" ></i>Registars</button>
                    </div>
                    <div class="col-lg-2">
                        <span class="nav-pills-bordered">{{today()}}</span>
                    </div>
                </div>
            </div>
        </div>
    
    
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body py-4 h-full">
                        <div class="form-group row justify-between">
                                        <div class="col-lg-1">
                                            <button class="btn btn-light btn-icon" type="button"><i class="icon-user"></i></button>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="input-group">
                                                <select name="customer" id="customer_id" class="form-control select-search">
                                                    <option value="0" selected>Walk in Customer</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id}}">{{ $customer->fname }}</option>
                                                    @endforeach
                                                </select>											
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <span class="input-group-append" data-toggle="modal" data-target="#createCustomer">
                                                <span class="input-group-text"><i class="icon-plus3 px-2"></i> Add Cutomer</span>
                                            </span>
                                        </div>
                                    </div>
                    </div>
                        <table class="table table-bordered" id="productTable">
                            <thead class="bg-indigo-600">
                                <tr>
                                    <th>Product</th>
                                    <th>SKU</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-gray-200 h-full">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="text-center">
                                            <button type="button" class="btn btn-sm bg-brown-800" data-toggle="modal" data-target="#createDiscount">Discount (-) <i class="icon icon-pencil7 ml-2"></i></button>
                                    </td>
                                    <td>
                                        <input type="text" name="discountAmount" class="form-control" id="discountAmount" value="0.00" disabled>
                                    </td>
                                    {{-- <td class="text-center d-flex" colspan="4">
                                        <button class="btn btn-sm bg-brown-800"><i class="icon icon-pencil7 mr-2"></i>Shipping (+) </button>
                                    </td>
                                    <td>
                                        <input type="text" name="discount" class="form-control mx-2" id="discountAmount" value="0.00" disabled>
                                    </td> --}}
                                  
                                </tr>
                            </tfoot>
                        </table>
    
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        Product
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <select name="category" id="category" class="form-control select-search">
                                    <option value="">Select Category</option>
                                    @foreach ($categoryWiseProducts as $category => $products)
                                        <option value="{{ $category }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Product by sku"
                                        id="sku">
                                    <span class="input-group-append bg-indigo-600">
                                        <span class="input-group-text"><i class="icon-search4"></i></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <select name="brand" id="brand" class="form-control select-search">
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->title }}">{{ $brand->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product Title</th>
                                            <th>Product Variation SKU</th>
                                            <th>Product Variation</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody id="filteredProducts">
                                        @php
                                            $ser =1;
                                        @endphp
                                        @foreach ($products as $product)
                                            @foreach ($product->variations as $item)
                                                <tr data-category="{{ $product->category }}"
                                                    data-brand="{{ $product->brand }}">
                                                    <td>{{ $ser++}}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td >{{ $item->variation_sku }}</td>
                                                    <td>{{ $item->product_variation }}-{{ $item->value }}</td>
                                                    <td>{{ $product->selling_price }}</td>
                                                    <td>
                                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSn_CilQfREZOfjsqd98omCmcsUz9dQ3hzMQQ&usqp=CAU"
                                                            alt="no_image" height="50" width="50">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <button class="btn  bg-blue-800 mx-2"><i class="icon icon-pencil mr-2" ></i>Draft</button>
                                <button  class="btn  bg-indigo-800 mx-2"><i class="icon icon-pencil7 mr-2" ></i>Quotation</button>
                                <button class="btn  bg-warning-800 mx-2"><i class="icon icon-pause mr-2" ></i>Suspend</button>
                                {{-- <button type="submit" class="btn  bg-info-800 mx-2"><i class="icon icon-check mr-2"></i>Credit Sale</button> --}}
                                <button class="btn  bg-info-800"><i class="icon icon-history mr-2" ></i>Recent Sell</button>
                            </div>
                            <div class="col-lg-3">
                                <form id="saleForm" action="{{route('pos.store')}}" target="_blank" method="post">
                                    @csrf
                                    <input type="hidden" id="product_sku" name="product_sku">
                                    <input type="hidden" id="product_quantity" name="product_quantity">
                                    <input type="hidden" id="product_subtotal" name="product_subtotal">
                                    <input type="hidden" id="product_total" name="product_total">
                                    <input type="hidden" id="PayableAmount" name="totalPayableAmount">
                                    <input type="hidden" id="discountedAmount" name="discountedAmount">
                                    <input type="hidden" id="totalAmount" name="totalAmount">
                                    <input type="hidden" id="totalQuantity" name="totalQuantity">
                                    <input type="hidden" id="customerId" name="customerId">        
                                    <button type="submit" class="btn  bg-info-800 mx-2"><i class="icon icon-check mr-2"></i>Credit Sale</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body bg-indigo-800 p-2 text-center display-block d-flex">
                                    <h3>Payable Amount:</h3>
                                    <h3 id="totalPayableAmount" class="ml-2">15000</h3>
                    </div>
                </div>
            </div>
        </div>
    @include('customer.create-modal')

    @push('scripts')
        @include('pos.script')
    @endpush

</x-layouts.master>
