<x-layouts.master>
   <x-data-display.card>
      <x-slot name="Heading">
         {{__('Customers')}}
      </x-slot>
      <x-slot name="body">
         <div class="table">
             <table class="table datatable-basic">
                 <thead class="bg-indigo-600">
                     <tr>
                         <th>SL</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Phone</th>
                         <th>Address</th>
                         <th>Level</th>
                         <th class="text-center">Action</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($customers as $customer)
                         <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{ $customer->fname }}</td>
                             <td>{{ $customer->lname}}</td>
                             <td>{{ $customer->phone }}</td>
                             <td>{{ $customer->address }}</td>
                             <td>{{ $customer->city }}</td>
                             >
                            <td class="text-center">
                              <div class="list-icons">
                                 <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                       <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                       <a href="{{ route('customer.edit', $customer->id) }}" class="dropdown-item"><i class="icon-pencil7"></i> Edit customer</a>
                                       <a href="{{ route('customer.show', $customer->id) }}" class="dropdown-item"><i class="icon-eye"></i> View customer</a>
                                                   <form style="display:inline" action="{{ route('customer.destroy', $customer->id) }}"
                                                      method="POST">
                                                      @csrf
                                                      @method('delete')
                                                      <button
                                                         onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this customer?')){ this.closest('form').submit(); }"
                                                         class="dropdown-item"
                                                         title="Delete customer">
                                                         <i class="icon-trash-alt"></i>Delete
                                                      </button>
                                                   </form>
                                       <a href="{{route('label.print', $customer->id)}}" class="dropdown-item"><i class="icon-printer"></i> Print Label</a>
                                       <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
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
         <span class="btn 
         btn-sm 
         bg-success 
         border-2 
         border-success
         btn-icon 
         rounded-round 
         legitRipple 
         shadow 
         mr-1" data-toggle="modal" data-target="#createCustomer"><i class="icon-plus2"></i></span>
     </x-slot>
   </x-data-display.card>
   @include('customer.create-modal')
</x-layouts.master>