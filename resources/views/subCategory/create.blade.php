
            <form action="{{ route('subCategory.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>

                {{-- category --}}

                <label for="category">Select Category</label>
                <div class="input-group mb-3"> 
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    
                    <select name="category_id" class="form-control custom-select">
                    @foreach ($categories as $category )
                    <option value="{{ $category->id }}"name="title">{{ $category->title }}</option>
                                        
                    @endforeach
                    </select>
                </div>


 <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i class="icon-checkmark4 mr-1"></i>{{__('Submit')}}</button>
                    </div>
                </div>

            </form>

