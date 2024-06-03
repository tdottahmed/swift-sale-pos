<x-layouts.master>
    @include('tax.create')
    <x-data-display.card>
        <x-slot name="heading">
            Variations
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <th>SL</th>
                    <th>Title</th>
                    <th>Rate</th>
                    <th class="text-center">Action</th>
                </x-slot>
                <x-slot name="body">
                    @foreach ($taxes as $tax)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tax->title }}</td>
                            <td>
                                <span
                                    class="badge badge-light badge-striped badge-striped-left border-left-success">{{ $tax->value }}%
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('tax.edit', $tax->id) }}"
                                                class="dropdown-item"><i class="icon-pencil7"></i>Edit</a>
                                            <form style="display:inline"
                                                action="{{ route('tax.destroy', $tax->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this unit?')){ this.closest('form').submit(); }"
                                                    class="dropdown-item" title="Delete unit">
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
            <button type="button" class="btn bg-indigo-800" data-toggle="modal" data-target="#modal_default">Create
                <i class="icon-plus3 ml-2"></i></button>
        </x-slot>
    </x-data-display.card>

</x-layouts.master>
