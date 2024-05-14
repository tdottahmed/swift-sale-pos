 <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase" data-owl-options="{
            'loop': false
            }">
            @foreach ($sliders as $slider)
                {{-- @dd($slider) --}}
            <div class="home-slide {{$loop->first ? 'home-slide1' : 'home-slide2'}}  banner">

                <img class="slide-bg" src="{{ imagePath($slider->image) }}" width="1903" height="499" alt="slider image">
                <div class="container d-flex align-items-center">
                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                        <h4 class="text-transform-none m-b-3">{{$slider->heading}}</h4>
                        <h2 class="text-transform-none mb-0">{{$slider->title}}</h2>
                        <h3 class="m-b-3">{{$slider->sub_title}}</h3>
                        <h5 class="d-inline-block mb-0">
                            <span>{{$slider->starting_text}}</span>
                            <b class="coupon-sale-text text-white bg-secondary align-middle"><sup>$</sup><em
                                    class="align-text-top">{{$slider->highlighted_text}}</em><sup>{{$slider->highlighted_text}}</sup></b>
                        </h5>
                        <a href="category.html" class="btn btn-dark btn-lg">{{$slider->button_text}}</a>
                    </div>
                    <!-- End .banner-layer -->
                </div>
            </div>
            <!-- End .home-slide -->

            @endforeach


            {{-- <div class="home-slide home-slide2 banner banner-md-vw">
                <img class="slide-bg" style="background-color: #ccc;" width="1903" height="499" src="{{asset('porto')}}/images/demoes/demo4/slider/slide-2.jpg" alt="slider image">
                <div class="container d-flex align-items-center">
                    <div class="banner-layer d-flex justify-content-center appear-animate" data-animation-name="fadeInUpShorter">
                        <div class="mx-auto">
                            <h4 class="m-b-1">Extra</h4>
                            <h3 class="m-b-2">20% off</h3>
                            <h3 class="mb-2 heading-border">Accessories</h3>
                            <h2 class="text-transform-none m-b-4">Summer Sale</h2>
                            <a href="category.html" class="btn btn-block btn-dark">Shop All Sale</a>
                        </div>
                    </div>
                    <!-- End .banner-layer -->
                </div>
            </div> --}}
            <!-- End .home-slide -->
        </div>
        <!-- End .home-slider -->

        