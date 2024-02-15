<x-layouts.master>
    <div class="card ">
        <div class="card-header bg-teal">
            <h2>{{ __('Edit Your Brand Info') }}</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('brand.update', $brand->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $brand->title }}">
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <img class="mt-1" src="{{ asset('storage/brand') . '/' . $brand->image }}" width="100"
                        height="70" alt="no image">
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
