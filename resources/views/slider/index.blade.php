<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Slider
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">


                        <tr>
                            <th>SL</th>
                            <th>Sub Title</th>
                            <th>Title</th>
                            <th>Heading</th>
                            <th>Starting Text</th>
                            <th>Highlighted Text</th>
                            <th>Button Text</th>
                            <th>Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                          {{-- image, sub_title, title, heading, starting_text, highlighted_text, button_text --}}

                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $slider->sub_title }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->heading }}</td>
                                <td>{{ $slider->starting_text }}</td>
                                <td>{{ $slider->highlighted_text }}</td>
                                <td>{{ $slider->button_text }}</td>
                                <td><img src="{{imagePath($slider->image)}}" width="100"
                                        height="70" alt="no image"></td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('slider.edit', $slider->id) }}" class="dropdown-item"><i
                                                        class="icon-pencil7"></i> Edit Slider</a>
                                                <form style="display:inline"
                                                    action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this Slider?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete Slider">
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
            <a href="{{ route('slider.create') }}"
                class="btn 
            btn-sm 
            bg-success 
            border-2 
            border-success
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1">
            <i class="icon-plus2"></i></a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
