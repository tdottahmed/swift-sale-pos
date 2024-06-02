



<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Employee List
        </x-slot>


        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaveTypes as $leaveType)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $leaveType->title }}</td>
                               <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('leaveType.edit', $leaveType->id) }}" class="dropdown-item">
                                                <i class="icon-pencil7"></i> Edit leaveType
                                            </a>
                                            @if ($leaveType->LeaveTypes->isEmpty())
                                                <form style="display:inline" action="{{ route('leaveType.destroy', $leaveType->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this leaveType?')){ this.closest('form').submit(); }" class="dropdown-item" title="Delete leaveType">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form>
                                            @endif
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
            <a href="{{ route('leaveType.create') }}"
                class="btn 
            btn-sm 
            bg-success 
            border-2 
            border-success
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"
                data-toggle="modal" data-target="#createEmployee"><i class="icon-plus2"></i></a>
        </x-slot>
    </x-data-display.card>

    @include('leaveType.create-modal')


</x-layouts.master>
