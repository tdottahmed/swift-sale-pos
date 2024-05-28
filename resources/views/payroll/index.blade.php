<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Payroll List
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Employee</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Reference</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payrolls as $payroll)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payroll->employee_id }}</td>
                                <td>{{ $payroll->payment_method_id }}</td>
                                <td>{{ $payroll->amount }}</td>
                                <td>{{ $payroll->reference }}</td>
                                <td>{{ $payroll->created_at }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('payroll.edit', $payroll->id) }}"
                                                    class="dropdown-item "><i class="icon-pencil7"></i> Edit
                                                    Payroll</a>
                                                <form style="display:inline"
                                                    action="{{ route('payroll.destroy', $payroll->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this payroll?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete payroll">
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
            <a href="{{ route('payroll.create') }}"
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
                data-toggle="modal" data-target="#createPayroll"><i class="icon-plus2"></i></a>
        </x-slot>
    </x-data-display.card>
    @include('payroll.create-modal')
</x-layouts.master>
