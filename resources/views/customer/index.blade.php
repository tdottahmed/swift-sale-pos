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
         mr-1" data-toggle="modal" data-target="#modal_form_horizontal"><i class="icon-plus2"></i></span>
     </x-slot>
   </x-data-display.card>
   <div id="modal_form_horizontal" class="modal fade" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Create Employee</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" class="form-horizontal">
               <div class="modal-body">
                  <div class="form-group row">
                     <label class="col-form-label col-sm-3">First name</label>
                     <div class="col-sm-9">
                        <input type="text" placeholder="Eugene" class="form-control" name="fname">
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="col-form-label col-sm-3">Last name</label>
                     <div class="col-sm-9">
                        <input type="text" placeholder="Kopyov" class="form-control" name="lname">
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="col-form-label col-sm-3">Email</label>
                     <div class="col-sm-9">
                        <input type="email" placeholder="eugene@kopyov.com" class="form-control" name="email">
                        <span class="form-text text-muted">name@domain.com</span>
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="col-form-label col-sm-3">Phone #</label>
                     <div class="col-sm-9">
                        <input type="text" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999" class="form-control" name="phone">
                        <span class="form-text text-muted">+99-99-9999-9999</span>
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="col-form-label col-sm-3">Address line 1</label>
                     <div class="col-sm-9">
                        <input type="text" placeholder="Ring street 12, building D, flat #67" class="form-control" name="address">
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="col-form-label col-sm-3">City</label>
                     <div class="col-sm-9">
                        <input type="text" placeholder="Munich" class="form-control" name="city">
                     </div>
                  </div>

                  <div class="form-group row">
                     <label class="col-form-label col-sm-3">State/Province</label>
                     <div class="col-sm-9">
                        <input type="text" placeholder="Bayern" class="form-control" name="state">
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-lg bg-danger-400 shadow-2" data-dismiss="modal"><i
                     class="icon-cross2 mr-1"></i>Close</button>
                  <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                     class="icon-checkmark4 mr-1 "></i>{{ __('Submit') }}</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</x-layouts.master>