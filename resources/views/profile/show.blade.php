<x-layouts.master>
    {{-- @dd(auth()->user()->getMedia('default')) --}}
    

    <x-data-display.card>
        <x-slot name="heading">
            {{ Auth::user()->name }}
        </x-slot>
        <x-slot name="body">
            <div style="width: 30%; margin-left: 45%;">
                <div class="mr-3" style="width: 200px; height: 200px;">
                    <a href="#"><img src="{{ asset(Auth::user()->image_url) }}" width="200" height="200" class="rounded-circle" alt=""></a>
                    {{-- @if (auth()->user()->getFirstMedia('avatars'))
                    <img src="{{ storage_path(auth()->user()->getFirstMedia('avatars')->getUrl()) }}" alt="Avatar">
                @else
                    <p>No avatar found</p>
                @endif --}}
                
                   
                </div>

                <div class="" style="margin-top: 70px;">
                    <div class="media-title font-weight-semibold" style="border: 2px solid black; width: 50%; border-radius: 20%"><p style="text-align: center; font-weight:900; font-size: 30px; margin-bottom: 0.25rem;">{{Auth::user()->name}}</p></div>
                    <div style="margin-left: 25%; margin-top: 5%">
                        <i class="icon-pin font-size-sm"></i>
                    </div>
                    <div class="font-size-xs opacity-50" style="margin-left: 11%">
                         &nbsp;<span style="font-size: 15px; text-align:center">{{Auth::user()->email}}</span>
                    </div>
                </div>  

               
            </div>
        
        </x-slot>
    </x-data-display.card>
</x-layouts.master>