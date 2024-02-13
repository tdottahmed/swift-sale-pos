<x-layouts.master>
    <div class="card">
        <div class="card-header">
            <h2>{{ __('Organization') }}</h2>
        </div>

        <div class="card-body">
            <div class="table">
                <table class="table table-bordered">
                    <thead class="bg-teal">
                        <tr>
                            <th class="text-center">Sl</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Logo</th>
                            <th class="text-center">Footer Logo</th>
                            <th class="text-center">Favicon</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($organizations as $organization)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $organization->title }}</td>
                                <td><img src="{{ asset('storage/organization') . '/' . $organization->logo }}"
                                        width="100" height="70" alt="no image">
                                </td>
                                <td><img src="{{ asset('storage/organization') . '/' . $organization->footer_logo }}"
                                        width="100" height="70" alt="no image">
                                </td>
                                <td><img src="{{ asset('storage/organization') . '/' . $organization->favicon }}"
                                        width="100" height="70" alt="no image">
                                </td>
                                <td>
                                    <a href="{{ route('organization.edit', $organization->id) }}"
                                        class="btn btn-success btn-sm">edit</a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center">
                                No data
                            </td>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
            @if ($organizations->isEmpty())
                <a href="{{ route('organization.create') }}" class="btn btn-success btn-sm">Create</a>
            @endif
        </div>



    </div>


</x-layouts.master>
