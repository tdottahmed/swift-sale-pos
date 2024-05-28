<div class="brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn"
    data-animation-duration="500" data-owl-options="{
                'margin': 0}">
    @foreach ($brands as $brand)
        <img src="{{ imagePath($brand->image) }}" width="130" height="56" alt="brand">
    @endforeach
</div>
