<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Leave Application List
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Leave Types</th>
                            <th>Form</th>
                            <th>To</th>
                            <th>Departmen</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaves as $leave)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $leave->leaveType->title }}</td>
                                <td>{{ $leave->from }}</td>
                                <td>{{ $leave->to }}</td>
                                <td>{{ $leave->department->title }}</td>
                                <td>
                                    <form action="{{ route('leave.update.status', $leave->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="{{ $leave->status }}">
                                        <button type="submit"
                                            class="btn btn-sm {{ $leave->status == 1 ? 'btn-success' : 'btn-warning' }}">
                                            {{ $leave->status == 1 ? 'Approved' : 'Pending' }}
                                        </button>
                                    </form>

                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a onclick="openModal('{{ route('leave.edit', $leave->id) }}', 'Create Employee')"
                                                    class="dropdown-item"><i class="icon-pencil7"></i> Edit
                                                    Application</a>

                                                <a href="{{ route('leave.pdf', $leave->id) }}" class="dropdown-item"
                                                    target="_blank"><i class="icon-eye"></i> pdf </a>
                                                <form style="display:inline"
                                                    action="{{ route('leave.destroy', $leave->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this leave application?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete leave">
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
            <a href="{{ route('leave.create') }}" class="btn bg-indigo-800" data-toggle="modal"
                data-target="#createLeave">Create <i class="icon-plus3 ml-2"></i></a>
        </x-slot>
    </x-data-display.card>
    @include('leave.create-modal')

</x-layouts.master>
