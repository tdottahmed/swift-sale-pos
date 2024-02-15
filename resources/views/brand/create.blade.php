<x-layouts.master>
    <div class="card ">
        <div class="card-header bg-teal">
            <h2>{{ __('Insert Your Brand Info') }}</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('brand.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>





                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-info" value="Submit">
                </div>

            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('brand.index') }}" class="btn btn-success btn-sm">List</a>
        </div>
    </div>


</x-layouts.master>
