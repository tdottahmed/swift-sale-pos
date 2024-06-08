<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Order: #{{$orders->id}}
        </x-slot>

        

        <x-slot name="body">

            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body" >
                            <div>
                                <h4>Shipping address</h4>
                                <address>
                                    {{$orders->first_name.' '.$orders->last_name}} <br>
                                    {{$orders->address}} <br>
                                    {{$orders->city}} , {{$orders->zip}}, {{$orders->countryName}}<br>
                                    Phone: {{$orders->mobile}} <br>
                                    Email: {{$orders->email}}
                                </address>
                            </div>
                            
                        </div>
                      </div>
                </div>

                <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">
                            <div>
                                {{-- <b>Invoice :</b> <br> --}}
                                <b>order Id:</b> {{$orders->id}} <br>
                                <b>Total:</b> ${{number_format($orders->grand_total)}} <br>
                                <b>Status:</b> 
                                
                                    @if ($orders->status == 'pending')
                                    <span class="badge bg-danger">Pending</span>
                                    @elseif ($orders->status == 'shipped')
                                    <span class="badge bg-info">Shipped</span>
                                    @else
                                    <span class="badge bg-success">Delivered</span>
                                @endif
                            </div>
                                
                        </div>
                      </div>
                </div>
                <div class="col-sm-6">

                    <div class="card">
                        <h5 class="card-header">Order Status</h5>
                        <div class="card-body">
                            <select name="status" id="status" class="form-control">
                                <option value="pending" {{$orders->status == 'pending' ? 'selected' : ''}}>Pending</option>
                                <option value="shipped" {{$orders->status == 'shipped' ? 'selected' : ''}}>Shipped</option>
                                <option value="delivered" {{$orders->status == 'delivered' ? 'selected' : ''}}>Delivered</option>
                            </select>
                        </div>
                      </div>
                      <div class="card">
                        <h5 class="card-header">Send Invoice Email</h5>
                        <div class="card-body">
                            <select name="" id="" class="form-control">
                                <option value="customer">Customer</option>
                            </select>
                        </div>
                      </div>
                </div>
            </div>
           


            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($orderItems as $item)
                      <tr>
                        <td>{{$item->name}}</td>
                        <td>{{number_format($item->price,2)}}</td>
                        <td>{{$item->qty}}</td>
                        <td>${{number_format($item->total,2)}}</td>
                    </tr>
                      @endforeach
                       
                        <tr>
                            <th colspan="3" class="text-right">Subtotal:</th>
                            <td>${{number_format($orders->subtotal,2)}}</td>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">Discount:{{(!empty($orders->coupon_code)) ? '(' .$orders->coupon_code . ')': ''}}</th>
                            <td>${{number_format($orders->discount,2)}}</td>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">Shipping:</th>
                            <td>${{number_format($orders->shipping,2)}}</td>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">Grand Total:</th>
                            <td>${{number_format($orders->grand_total,2)}}</td>
                        </tr>
        


                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{route('orders.index')}}" class="btn 
            btn-sm 
            bg-success 
            border-2 
            border-success
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"><i class="icon-plus2"></i></a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>