
            <form action="{{route('coupon.create')}}" method="post" id="discountForm" name="discountForm" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-6">
                        <label for="title">Coupon Code</label>
                        <input type="text" class="form-control" name="code" id="code" placeholder="Coupon Code">
                        <p></p>
                    </div>
                    <div class="col-6">
                        <label for="title">Creator Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                        <p></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-6">
                        <label for="title">Maximum Uses</label>
                        <input type="number" class="form-control" name="max_uses" id="max_uses" placeholder="Maximum using time">
                    </div>
                    <div class="col-6">
                        <label for="title">Maximum Uses User</label>
                        <input type="text" class="form-control" name="max_uses_user" id="max_uses_user" placeholder="Maximum uses user">
                    </div>
                </div>
               <div class="form-group row">
                <div class="col-6">
                    <label for="discount_amount">Discount Amount</label>
                    <input type="text" class="form-control" name="discount_amount" id="discount_amount" placeholder="Discount Amount">
                    <p></p>
                </div>

                <div class="col-6">
                    <label for="min_amount">Minimum Amount</label>
                    <input type="text" class="form-control" name="min_amount" id="min_amount" placeholder="Minimum Amount">
                </div>
               </div>
                
               <div class="form-group row">
                <div class="col-6">
                    <label for="type">Discount Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="percent">Percent</option>
                        <option value="fixed">Fixed</option>
                    </select>
                </div>

                <div class="col-6">
                    <label for="status">Coupon Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Block</option>
                    </select>
                </div>
               </div>
               <div class="form-group row">
                <div class="col-6">
                    <label for="starts_at">Starts Date</label>
                    <input autocomplete="off" type="text" class="form-control" name="starts_at" id="starts_at" placeholder="Starts Date">
                    <p></p>
                </div>

                <div class="col-6">
                    <label for="expires_at">Expires Date</label>
                    <input autocomplete="off" type="text" class="form-control" name="expires_at" id="expires_at" placeholder="Expires Date">
                    <p></p>
                </div>
               </div>

               

               

                <div class="mb-3">
                    <label for="title">Description</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                    <p></p>
                </div>

                

             <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i class="icon-checkmark4 mr-1"></i>{{__('Submit')}}</button>
                    </div>
                </div>

            </form>

