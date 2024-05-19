<div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
    <div class="product-reviews-content">
        <h3 class="reviews-title">{{count($reviews)}} Review of <strong>{{$product->name}}</strong></h3>

        <div class="comment-list">
            @forelse ($reviews as $review)
            <div class="comments">
                <figure class="img-thumbnail">

                    <img src="{{ customAvatar($review->user_name) }}" alt="author" width="80" height="80">
                </figure>

                <div class="comment-block">
                    <div class="comment-header">
                        <div class="comment-arrow"></div>

                        <div class="ratings-container float-sm-right">
                            <div class="product-ratings">
                                <span class="ratings" style="width:60%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>

                        <span class="comment-by">
                            <strong>{{$review->user_name}}</strong> – {{readableDate($review->created_at)}}
                        </span>
                    </div>

                    <div class="comment-content">
                        <p>{!! $review->description !!}</p>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse
           
        </div>

        <div class="divider"></div>

        <div class="add-product-review">
            <h3 class="review-title">Add a review</h3>

            <form action="{{ route('review.post') }}" class="comment-form m-0" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="rating-form">
                    <label for="rating">Your rating <span class="required">*</span></label>
                    <span class="rating-stars">
                        <a class="star-1" href="#">1</a>
                        <a class="star-2" href="#">2</a>
                        <a class="star-3" href="#">3</a>
                        <a class="star-4" href="#">4</a>
                        <a class="star-5" href="#">5</a>
                    </span>

                    <select name="rating" id="rating" required="" style="display: none;">
                        <option value="">Rate…</option>
                        <option value=5>Perfect</option>
                        <option value=4>Good</option>
                        <option value=3>Average</option>
                        <option value=2>Not that bad</option>
                        <option value=1>Very poor</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Your review <span class="required">*</span></label>
                    <textarea cols="5" rows="6" class="form-control form-control-sm" name="description"></textarea>
                </div>
                <!-- End .form-group -->


                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="form-group">
                            <label>Name <span class="required">*</span></label>
                            <input type="text" name="user_name"
                                value="{{ auth()->user() ? auth()->user()->name : '' }}"
                                class="form-control form-control-sm" required>
                        </div>
                        <!-- End .form-group -->
                    </div>

                    <div class="col-md-6 col-xl-12">
                        <div class="form-group">
                            <label>Email <span class="required">*</span></label>
                            <input type="text" name="user_email" class="form-control form-control-sm"
                                value="{{ auth()->user() ? auth()->user()->email : '' }}" required>
                        </div>
                        <!-- End .form-group -->
                    </div>

                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-name" />
                            <label class="custom-control-label mb-0" for="save-name">Save my
                                name, email, and website in this browser for the next time I
                                comment.</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Post Review</button>
            </form>
        </div>
        <!-- End .add-product-review -->
    </div>
    <!-- End .product-reviews-content -->
</div>
