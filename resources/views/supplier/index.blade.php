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
                            <x-data-display.table-actions :actions="[
                                ['route' => 'supplier.edit', 'params' => $supplier->id, 'label' => 'Edit Supplier', 'icon' => 'icon-pencil7'],
                                ['route' => 'supplier.destroy', 'params' => $supplier->id, 'label' => 'Delete Supplier', 'icon' => 'icon-trash-alt', 'method' => 'delete']
                            ]" />
                            
                           </td>
                       </tr>
                   @endforeach
               </x-slot>
           </x-data-display.table>
       </x-slot>
       <x-slot name="cardFooterCenter">
        <x-action.create-btn route="{{ route('supplier.create') }}" buttonLabel="Create Supplier" modalHeaderLabel="Create New Supplier" />
       </x-slot>
   </x-data-display.card>
</x-layouts.master>
