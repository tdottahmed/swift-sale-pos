<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{-- A 2 Z-{{ $blogs->id }} --}}
        </x-slot>
        <x-slot name="body">
             
            <div class="row m-1">
                <div class="col-lg-3">
                    <div>
                        <label for="">
                            {{-- <p><strong>Blog Title  :</strong> {{ isset($blogs->title) ? $blogs->title : ' ' }}</p> --}}
                            <p><strong>Blog Title  :</strong> {{$blog->title }}</p>
                        </label>
                    </div>
                   
                    {{-- <div>
                        <label for="">
                            <p><strong>Unit :</strong> {{ isset($blog->unit) ? $blog->unit : ' ' }}</p>
                        </label>
                    </div> --}}
                    
                <div class="col-lg-3">
                    <div>
                        @if ($blog->image)
                            <img src="{{ imagePath($blog->image)}}" 
                                 alt="blog Image"width="250" height="200" height="auto">
                        @else
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDpYgKX6Na9EAfhKgjLD4iyPugeNE0wggdkw&usqp=CAU"
                                width="250" height="200" alt="Default Image">
                        @endif
                    </div>


                </div>

            </div>

           



        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('blogs.create') }}"
                class="btn 
            btn-sm 
            bg-success 
            border-2 
            border-success
            btn-icon    
            rounded-round 
            legitRipple 
            shadow 
            mr-1"><i
                    class="icon-plus2"></i></a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
