<!-- suppliers-index.blade.php -->

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
                               <button type="button" class="btn btn-sm btn-primary" onclick="openModal('{{route('supplier.edit', $supplier->id)}}')">
                                   Edit
                               </button>
                               <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" style="display: inline;">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</button>
                               </form>
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
