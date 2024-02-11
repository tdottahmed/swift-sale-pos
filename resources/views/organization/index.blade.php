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
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organizations as $organization)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $organization->title }}</td>
                            <td>{{ $organization->logo }}</td>
                            <td></td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('organization.create') }}" class="btn btn-success btn-sm">create</a>
        </div>
    </div>


</x-layouts.master>
