<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Attendance List
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Note</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->date }}</td>
                                <td>{{ $attendance->check_in }}</td>
                                <td>{{ $attendance->check_out }}</td>
                                <td>{{ $attendance->note }}</td>
                               
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('attendance.edit', $attendance->id) }}"
                                                    class="dropdown-item "><i class="icon-pencil7"></i> Edit
                                                    Attendance</a>
                                                <form style="display:inline"
                                                    action="{{ route('attendance.destroy', $attendance->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this attendance?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete attendance">
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
            <a href="{{ route('attendance.create') }}"
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
                data-toggle="modal" data-target="#createAttendance"><i class="icon-plus2"></i></a>
        </x-slot>
    </x-data-display.card>
    @include('attendance.create-modal')
</x-layouts.master>
