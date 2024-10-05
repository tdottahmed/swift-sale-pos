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
                            <th>Name</th>
                            <th>Department</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Date Of Birth</th>
                            <th>Address</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->department->title }}</td>
                                <td>{{ $employee->role->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->dob }}</td>
                                <td>{{ $employee->address }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a 
                                                onclick="openModal('{{route('employee.edit', $employee->id)}}', 'Create Employee')"                                               
                                                    class="dropdown-item "><i class="icon-pencil7"></i> Edit
                                                    employee</a>
                                                {{-- <form style="display:inline"
                                                    action="{{ route('employee.destroy', $employee->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this employee?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete employee">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form> --}}

                                                @if ($employee->emplos->isEmpty())
                                                <form style="display:inline" action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this Employee?')){ this.closest('form').submit(); }" class="dropdown-item" title="Delete employee">
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

                <button type="button" class="btn bg-indigo-800" data-toggle="modal" data-target="#createEmployee" href="{{ route('employee.create') }}">
                    Create <i class="icon-plus3 ml-2"></i>
                </button>
        </x-slot>
    </x-data-display.card>

    @include('employee.create-modal')


</x-layouts.master>
