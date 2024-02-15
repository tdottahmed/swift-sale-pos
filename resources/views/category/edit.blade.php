<x-layouts.master>
    <div class="card ">
        <div class="card-header bg-teal">
            <h2>{{ __('Edit Your Category') }}</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ $category->title }}">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-info" value="Submit">
                </div>

            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('category.index') }}" class="btn btn-success btn-sm">List</a>
        </div>
    </div>


</x-layouts.master>
