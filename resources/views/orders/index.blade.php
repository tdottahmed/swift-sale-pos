<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Order
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>Order</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Date Purcess</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if ($orders->isNotEmpty()) --}}
                        @foreach ($orders as $order)
                        <tr>
                            
                            <td><a href="{{route('orders.detail', [$order->id])}}">{{ $order->id}}</a></td>
                            <td>{{ $order->first_name}} {{ $order->last_name }} </td>
                            <td>{{ $order->email}}</td>
                            <td>{{ $order->mobile}}</td>
                            <td>
                                @if ($order->status == 'pending')
                                    <span class="badge bg-danger">Pending</span>
                                    @elseif ($order->status == 'shipped')
                                    <span class="badge bg-info">Shipped</span>
                                    @elseif ($order->status == 'delivered')
                                    <span class="badge bg-success">Delivered</span>
                                    @else
                                    <span class="badge bg-danger">Cancelled</span>

                                @endif
                            </td>
                            <td>${{ number_format($order->grand_total,2)}}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y')}}</td>
                           
                           <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="" class="dropdown-item"><i class="icon-pencil7"></i> Edit size</a>
                                            <form style="display:inline" action=""
                                                method="POST">
                                               
                                                <button
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this size?')){ this.closest('form').submit(); }"
                                                    class="dropdown-item"
                                                    title="Delete size">
                                                    <i class="icon-trash-alt"></i>Delete
                                                </button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- @else
                    <tr>
                        <td colspan="5">Records Not Found</td>
                    </tr>
                        @endif --}}
                      



                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="" class="btn 
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