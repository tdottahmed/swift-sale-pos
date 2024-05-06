<x-frontend.porto.layout.master>

    <x-frontend.porto.slider />
    <x-frontend.porto.promo />
    <x-frontend.porto.featured-product />

    <section class="new-products-section">
        <div class="container">
            <x-frontend.porto.new-arrival />
            <!-- End .featured-proucts -->
            <x-frontend.porto.big-sale-banner />  
        </div>
    </section>

    <x-frontend.porto.our-category />
    <x-frontend.porto.top-fashion-banner />

    <section class="blog-section pb-0">
        <div class="container">
            <h2 class="section-title heading-border border-0 appear-animate" data-animation-name="fadeInUp">
                Latest News</h2>

            <x-frontend.porto.latest-news />

            <hr class="mt-0 m-b-5">

            <x-frontend.porto.brand-carousel />

            <!-- End .brands-slider -->

            <hr class="mt-4 m-b-5">

            <x-frontend.porto.product-widget />

            <!-- End .row -->
        </div>
    </section>

</x-frontend.porto.layout.master>
