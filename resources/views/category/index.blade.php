<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Category
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                            <th>SL</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th class="text-center">Action</th>
                </x-slot>
                <x-slot name="body">
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->title }}</td>
                                <td><img src="{{imagePath($category->image)}}" width="100"
                                    height="70" alt="no image"></td>
                               <td class="text-center">
                                <x-data-display.table-actions :actions="[
                                ['route' => 'category.edit', 'params' => $category->id, 'label' => 'Edit category', 'icon' => 'icon-pencil7'],
                                ['route' => 'category.destroy', 'params' => $category->id, 'label' => 'Delete category', 'icon' => 'icon-trash-alt', 'method' => 'delete']
                            ]" />
								</td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-action.create-btn route="{{ route('category.create') }}" buttonLabel="Create tax" modalHeaderLabel="Create New category" />
          
        </x-slot>
    </x-data-display.card>
</x-layouts.master>