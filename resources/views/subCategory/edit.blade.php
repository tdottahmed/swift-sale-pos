<x-layouts.master>
    <div class="card ">
        <div class="card-header bg-teal">
            <h2>{{ __('Edit Your SubCategory') }}</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('subCategory.update', $subCategory->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group clearfix">  
                        <label  for="">{{__("Select Category")}}</label> 
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" selected>-- Please select --</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$category->id==$subCategory->category_id? 'selected':''}}>{{$category->title}}</option>
                            
                        @endforeach 
                        </select>
                    </div>
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $subCategory->title }}">
                </div>
                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-info" value="Submit">
                </div>

            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('subCategory.index') }}" class="btn btn-success btn-sm">List</a>
        </div>
    </div>


</x-layouts.master>
