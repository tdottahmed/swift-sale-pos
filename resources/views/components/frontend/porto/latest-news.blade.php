
<div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeIn"
data-owl-options="{
    'loop': false,
    'margin': 20,
    'autoHeight': true,
    'autoplay': false,
    'dots': false,
    'items': 2,
    'responsive': {
        '0': {
            'items': 1
        },
        '480': {
            'items': 2
        },
        '576': {
            'items': 3
        },
        '768': {
            'items': 4
        }
    }
}">
@foreach ($blogs as $blog )
<article class="post">

                           
    {{-- <div class="post-media">
        <img class="slide-bg" src="{{ imagePath($blog->image) }}" width="200" height="200" alt="slider image">
        <div class="post-date">
            <span class="day">26</span>
            <span class="month">Feb</span>
        </div>
    </div> --}}
    {{-- test --}}
    <div class="">
        <div class="annual-single-event">
            <div class="event-content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="annual-img">                    
                        <a  href="{{ imagePath($blog->image) }}">
                            <img class="slide-bg" src="{{ imagePath($blog->image) }}" width="400" height="400" alt="slider image">
                        </a>
                        </div>
                    </div>                                           
                </div>
           </div>
        </div>
    </div> 
    {{-- test --}}


    <div class="post-body">
        <h2 class="post-title">
            <a href="{{ imagePath($blog->image) }}">{{$blog->title}}</a>
        </h2>
        {{-- <div class="post-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non
                tellus sem. Aenean...</p>
        </div>
         --}}
        <a class="text" class="post-comment">
            Total Comments: 
            @if ($blog->comment) {!! $blog->comment->count() !!} 
            @else 
              No comments yet
            @endif
          </a>
        
    </div>
    
    
    <a class="text-end" href="{{route('blogs.show',$blog->id)}}" class="post-comment">More Deteils</a>
 
</article>
@endforeach
</div>


