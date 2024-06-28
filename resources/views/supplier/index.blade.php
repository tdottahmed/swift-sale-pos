<x-layouts.master>
   <x-data-display.card>
       <x-slot name="heading">
           Suppliers
       </x-slot>
       <x-slot name="body">
           <x-data-display.table class="table-striped table-hover">
               <x-slot name="header">
                   <th>SL</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Email</th>
                   <th>Phone</th>
                   <th class="text-center">Actions</th>
               </x-slot>
               <x-slot name="body">
                   @foreach ($suppliers as $index => $supplier)
                       <tr>
                           <td>{{ $index + 1 }}</td>
                           <td>{{ $supplier->fname }}</td>
                           <td>{{ $supplier->lname }}</td>
                           <td>{{ $supplier->email }}</td>
                           <td>{{ $supplier->phone }}</td>
                           <td class="text-center">
                              <div class="list-icons">
                                 <div class="dropdown">
                                     <a href="#" class="list-icons-item" data-toggle="dropdown">
                                         <i class="icon-menu9"></i>
                                     </a>
                                     <div class="dropdown-menu dropdown-menu-right">
                                         <button type="button"
                                            onclick="openModal('{{route('supplier.edit', $supplier->id)}}', 'Edit Supplier')"
                                             class="dropdown-item "><i class="icon-pencil7"></i> Edit
                                             customer</button>
                                         
                                         <form style="display:inline"
                                             action="{{ route('supplier.destroy', $supplier->id) }}"
                                             method="POST">
                                             @csrf
                                             @method('delete')
                                             <button
                                                 onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this customer?')){ this.closest('form').submit(); }"
                                                 class="dropdown-item" title="Delete customer">
                                                 <i class="icon-trash-alt"></i>Delete
                                             </button>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                           </td>
                       </tr>
                   @endforeach
               </x-slot>
           </x-data-display.table>
       </x-slot>
       <x-slot name="cardFooterCenter">
           <button type="button" class="btn bg-indigo-800" onclick="openModal('{{route('supplier.create')}}', 'Create Supplier')">
               Create <i class="icon-plus3 ml-2"></i>
           </button>
       </x-slot>
   </x-data-display.card>
</x-layouts.master>
