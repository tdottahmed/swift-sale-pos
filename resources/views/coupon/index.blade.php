<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Size
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Starts Date</th>
                            <th>End Date</th>
                           
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($discountCoupons as $discountCoupon)
                            {{-- @dd($discountCoupons); --}}
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $discountCoupon->code}}</td>
                                <td>{{ $discountCoupon->name}}</td>
                                <td>
                                    @if ($discountCoupon->status == 1) 
                                    <button type="button" class="btn btn-primary">True</button>
                                    @else
                                    <button type="button" class="btn btn-danger">False</button>

                                    @endif
                                </td>
                                <td>
                                    @if ($discountCoupon->type == 'percent')
                                        {{$discountCoupon->discount_amount}}%
                                    @else
                                      ${{$discountCoupon->discount_amount}}
                                    @endif
                                </td>
                                <td>{{ (!empty($discountCoupon->starts_at)) ? \Carbon\Carbon::parse($discountCoupon->starts_at)->format('Y/m/d H:i:s') : '' }}</td>
                                <td>{{ (!empty($discountCoupon->expires_at)) ? \Carbon\Carbon::parse($discountCoupon->expires_at)->format('Y/m/d H:i:s') : '' }}</td>
                               <td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="{{ route('coupon.edit', $discountCoupon->id) }}" class="dropdown-item"><i class="icon-pencil7"></i> Edit size</a>
                                                <form style="display:inline" action="{{ route('coupon.destroy', $discountCoupon->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
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



                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('coupon.create') }}" class="btn 
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