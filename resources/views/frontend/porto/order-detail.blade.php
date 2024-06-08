<x-frontend.porto.layout.master>

    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.html">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Order Detail
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>Order Detail</h1>
        </div>
    </div>

    <div class="container account-container custom-account-container">
        <div class="row">
            <div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
                <h2 class="text-uppercase">My Order</h2>
                <ul class="nav nav-tabs list flex-column mb-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard"
                            role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab"
                            aria-controls="order" aria-selected="true">Orders</a>
                    </li>

                    
                </ul>
            </div>
            <div class="col-lg-9 order-lg-last order-1 tab-content">
                <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                    
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="order" role="tabpanel">
                    <div class="order-content">
                        <h3 class="account-sub-title d-none d-md-block"><i
                                class="sicon-social-dropbox align-middle mr-3"></i>Orders: {{ $order->id }}</h3>
                        <div class="order-table-container text-center">
                            <table class="table table-order text-left">
                                <thead>
                                    <tr>
                                        <th class="order-id">Order No</th>
                                        <th class="order-date">Shipped Date</th>
                                        <th class="order-status">Status</th>
                                        <th class="order-price">Order Amount</th>
                                        {{-- <th class="order-action">ACTIONS</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        
                                        <tr>

                                            <td class="text-center p-0"> {{$order->id}}</td>
                                            <td class="text-center p-0">
                                                @if (!empty($order->shipped_date))
                                                    {{ \Carbon\Carbon::parse($order->shipped_date)->format('d M, Y')}}
                                                    @else
                                                    n/a
                                                @endif
                                            
                                            </td>
                                            <td class="text-center p-0">
                                                @if ($order->status == 'pending')
                                                <span class="badge bg-danger">Pending</span>
                                                @elseif ($order->status == 'shipped')
                                                <span class="badge bg-info">Shipped</span>
                                                @else
                                                <span class="badge bg-success">Delivered</span>
                                                @elseif ($order->status == 'delivered')
                                                <span class="badge bg-success">Delivered</span>
                                                 @else
                                                <span class="badge bg-danger">Cancelled</span>

                                                @endif
                                            </td>
                                            <td class="text-center p-0">${{ number_format($order->grand_total,2) }}</td>
                                        </tr>
                                          
                                        
                                        
                                        
                                    </tr>
                                </tbody>
                            </table>
                            <hr class="mt-0 mb-3 pb-2" />

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-8">
                                <div class="cart-table-container">
                                    <table class="table table-cart">
                                        <thead>
                                            <th>Order Items ({{ $orderItemCount }})</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderItems as $orderItem)
                                            <tr class="product-row">
                                                <td>
                                                    <figure class="product-image-container">
                                                        <a href="product.html" class="product-image">
                                                            <img src="assets/images/products/product-6.jpg" alt="product">
                                                        </a>
        
                                                        {{-- <a href="#" class="btn-remove icon-cancel" title="Remove Product"></a> --}}
                                                    </figure>
                                                </td>
                                                <td class="product-col">
                                                    <h5 class="product-title">
                                                        <a href="product.html">{{$orderItem->name}} x {{$orderItem->qty}}</a>
                                                    </h5>
                                                    <p>${{ $orderItem->total }}</p>
                                                </td>
                                                
                                            </tr>  
                                            @endforeach
                                 
                                        </tbody>
        
        
                                    
                                    </table>
                                </div><!-- End .cart-table-container -->
                            </div><!-- End .col-lg-8 -->
        
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="order-table-container text-center">
                                <table class="table table-order text-left">
                                    <thead>
                                        <tr>
                                            <th class="order-id">Order Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
                                            <tr>
    
                                                <td class="text-center p-0"> subtotal</td>
                                                <td class="text-center p-0">${{number_format($order->subtotal,2)}}</td>
                                            </tr>

                                            <tr>
    
                                                <td class="text-center p-0"> Discount {{ (!empty($order->coupon_code)) ?'('. $order->coupon_code .')' : ''}}</td>
                                                <td class="text-center p-0">${{number_format($order->discount,2)}}</td>
                                            </tr>
                                            <tr>
    
                                                <td class="text-center p-0"> Shipping</td>
                                                <td class="text-center p-0">${{number_format($order->shipping,2)}}</td>
                                            </tr>
                                            <tr>
    
                                                <td class="text-center p-0">Total</td>
                                                <td class="text-center p-0">${{number_format($order->grand_total,2)}}</td>
                                            </tr>
                                            
                                            
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                <hr class="mt-0 mb-3 pb-2" />
    
                            </div>
                        </div>
                    </div>
                </div>

                

                

                <div class="tab-pane fade" id="download" role="tabpanel">
                    <div class="download-content">
                        <h3 class="account-sub-title d-none d-md-block"><i
                                class="sicon-cloud-download align-middle mr-3"></i>Downloads</h3>
                        <div class="download-table-container">
                            <p>No downloads available yet.</p> <a href="category.html"
                                class="btn btn-primary text-transform-none mb-2">GO SHOP</a>
                        </div>
                    </div>
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="address" role="tabpanel">
                    <h3 class="account-sub-title d-none d-md-block mb-1"><i
                            class="sicon-location-pin align-middle mr-3"></i>Addresses</h3>
                    <div class="addresses-content">
                        <p class="mb-4">
                            The following addresses will be used on the checkout page by
                            default.
                        </p>

                        <div class="row">
                            <div class="address col-md-6">
                                <div class="heading d-flex">
                                    <h4 class="text-dark mb-0">Billing address</h4>
                                </div>

                                <div class="address-box">
                                    You have not set up this type of address yet.
                                </div>

                                <a href="#billing" class="btn btn-default address-action link-to-tab">Add
                                    Address</a>
                            </div>

                            <div class="address col-md-6 mt-5 mt-md-0">
                                <div class="heading d-flex">
                                    <h4 class="text-dark mb-0">
                                        Shipping address
                                    </h4>
                                </div>

                                <div class="address-box">
                                    You have not set up this type of address yet.
                                </div>

                                <a href="#shipping" class="btn btn-default address-action link-to-tab">Add
                                    Address</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="edit" role="tabpanel">
                    <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
                            class="icon-user-2 align-middle mr-3 pr-1"></i>Account Details</h3>
                    <div class="account-content">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="acc-name">First name <span class="required">*</span></label>
                                        <input type="text" class="form-control" placeholder="Editor"
                                            id="acc-name" name="acc-name" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="acc-lastname">Last name <span
                                                class="required">*</span></label>
                                        <input type="text" class="form-control" id="acc-lastname"
                                            name="acc-lastname" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="acc-text">Display name <span class="required">*</span></label>
                                <input type="text" class="form-control" id="acc-text" name="acc-text"
                                    placeholder="Editor" required />
                                <p>This will be how your name will be displayed in the account section and
                                    in
                                    reviews</p>
                            </div>


                            <div class="form-group mb-4">
                                <label for="acc-email">Email address <span class="required">*</span></label>
                                <input type="email" class="form-control" id="acc-email" name="acc-email"
                                    placeholder="editor@gmail.com" required />
                            </div>

                            <div class="change-password">
                                <h3 class="text-uppercase mb-2">Password Change</h3>

                                <div class="form-group">
                                    <label for="acc-password">Current Password (leave blank to leave
                                        unchanged)</label>
                                    <input type="password" class="form-control" id="acc-password"
                                        name="acc-password" />
                                </div>

                                <div class="form-group">
                                    <label for="acc-password">New Password (leave blank to leave
                                        unchanged)</label>
                                    <input type="password" class="form-control" id="acc-new-password"
                                        name="acc-new-password" />
                                </div>

                                <div class="form-group">
                                    <label for="acc-password">Confirm New Password</label>
                                    <input type="password" class="form-control" id="acc-confirm-password"
                                        name="acc-confirm-password" />
                                </div>
                            </div>

                            <div class="form-footer mt-3 mb-0">
                                <button type="submit" class="btn btn-dark mr-0">
                                    Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="billing" role="tabpanel">
                    <div class="address account-content mt-0 pt-2">
                        <h4 class="title">Billing address</h4>

                        <form class="mb-2" action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First name <span class="required">*</span></label>
                                        <input type="text" class="form-control" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last name <span class="required">*</span></label>
                                        <input type="text" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Company </label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="select-custom">
                                <label>Country / Region <span class="required">*</span></label>
                                <select name="orderby" class="form-control">
                                    <option value="" selected="selected">British Indian Ocean Territory
                                    </option>
                                    <option value="1">Brunei</option>
                                    <option value="2">Bulgaria</option>
                                    <option value="3">Burkina Faso</option>
                                    <option value="4">Burundi</option>
                                    <option value="5">Cameroon</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Street address <span class="required">*</span></label>
                                <input type="text" class="form-control"
                                    placeholder="House number and street name" required />
                                <input type="text" class="form-control"
                                    placeholder="Apartment, suite, unit, etc. (optional)" required />
                            </div>

                            <div class="form-group">
                                <label>Town / City <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label>State / Country <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label>Postcode / ZIP <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>

                            <div class="form-group mb-3">
                                <label>Phone <span class="required">*</span></label>
                                <input type="number" class="form-control" required />
                            </div>

                            <div class="form-group mb-3">
                                <label>Email address <span class="required">*</span></label>
                                <input type="email" class="form-control" placeholder="editor@gmail.com"
                                    required />
                            </div>

                            <div class="form-footer mb-0">
                                <div class="form-footer-right">
                                    <button type="submit" class="btn btn-dark py-4">
                                        Save Address
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="shipping" role="tabpanel">
                    <div class="address account-content mt-0 pt-2">
                        <h4 class="title mb-3">Shipping Address</h4>

                        <form class="mb-2" action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First name <span class="required">*</span></label>
                                        <input type="text" class="form-control" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last name <span class="required">*</span></label>
                                        <input type="text" class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Company </label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="select-custom">
                                <label>Country / Region <span class="required">*</span></label>
                                <select name="orderby" class="form-control">
                                    <option value="" selected="selected">British Indian Ocean Territory
                                    </option>
                                    <option value="1">Brunei</option>
                                    <option value="2">Bulgaria</option>
                                    <option value="3">Burkina Faso</option>
                                    <option value="4">Burundi</option>
                                    <option value="5">Cameroon</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Street address <span class="required">*</span></label>
                                <input type="text" class="form-control"
                                    placeholder="House number and street name" required />
                                <input type="text" class="form-control"
                                    placeholder="Apartment, suite, unit, etc. (optional)" required />
                            </div>

                            <div class="form-group">
                                <label>Town / City <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label>State / Country <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label>Postcode / ZIP <span class="required">*</span></label>
                                <input type="text" class="form-control" required />
                            </div>

                            <div class="form-footer mb-0">
                                <div class="form-footer-right">
                                    <button type="submit" class="btn btn-dark py-4">
                                        Save Address
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->


</x-frontend.porto.layout.master>