
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

                        
                    
                    <div class="post-media">
                        <img class="slide-bg" src="{{ imagePath($blog->image) }}" width="200" height="200" alt="slider image">
                        <div class="post-date">
                            <span class="day">26</span>
                            <span class="month">Feb</span>
                        </div>
                    </div>
                    <!-- End .post-media -->

                    <div class="post-body">
                        <h2 class="post-title">
                            <a href="single.html">{{$blog->title}}</a>
                        </h2>
                        <div class="post-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non
                                tellus sem. Aenean...</p>
                        </div>
                        <!-- End .post-content -->
                        <a href="single.html" class="post-comment">0 Comments</a>
                    </div>
                    <!-- End .post-body -->
                 
                </article>
                @endforeach


 
            </div>