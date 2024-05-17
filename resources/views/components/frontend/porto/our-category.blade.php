<section class="new-products-section">
        <div class="container">
           
            <h2 class="section-title categories-section-title heading-border border-0 ls-0 appear-animate"
                data-animation-delay="100" data-animation-name="fadeInUpShorter">Browse Our Categories
            </h2>


            {{-- @dd($category) --}}
            <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">
                @foreach ($categories as $category)
                <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                    <a href="category.html">
                        <figure>
                            <img src="{{ imagePath($category->image) }}"
                                alt="category" width="280" height="240" />
                        </figure>
                        <div class="category-content">
                            <h3>{{$category->title ?? null}}</h3>
                            <span><mark class="count">3</mark> products</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            
        </div>
    </section>