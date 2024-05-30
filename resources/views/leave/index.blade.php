<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
           Leave List
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Form</th>
                            <th>To</th>
                            <th>Status</th>
                            <th>Attachment</th>
                            <th>Description</th>
                            <th>Leave Types</th>
                            <th>Employee</th>
                            <th>Departmen</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaves as $leave)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $leave->title }}</td>
                                <td>{{ $leave->from }}</td>
                                <td>{{ $leave->to }}</td>
                                <td>{{ $leave->status }}</td>
                                <td>{{ $leave->attachment }}</td>
                                <td>{{ $leave->description }}</td>
                                <td>{{ $leave->leaveTypes->title }}</td>
                                <td>{{ $leave->leaveEmployees->name}}</td>
                                <td>{{ $leave->leavedepartmens->title}}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('leave.edit', $leave->id) }}"
                                                    class="dropdown-item"><i class="icon-pencil7"></i> Edit Sub
                                                    Category</a>
                                                <form style="display:inline"
                                                    action="{{ route('leave.destroy', $leave->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this leave?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete leave">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form>
                                                {{-- <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
												<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> --}}
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
            <a href="{{ route('leave.create') }}"
                class="btn 
            btn-sm 
            bg-success 
            border-2 
            border-success
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"><i
                    class="icon-plus2"></i></a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
