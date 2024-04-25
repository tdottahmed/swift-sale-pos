<x-layouts.master>
   <div class="card">
      <div class="card-body">
         <form action="{{route('smtp.store')}}" method="POST" class="form-group">
            @csrf
            <div class="my-2">
               <label for="mail_host">Mail Host</label>
               <input type="text" id="mail_host" name="MAIL_HOST" class="form-control" placeholder="mail.mailtrap.io">
            </div>
            <div class="my-2">
               <label for="mail_port">Mail Port</label>
               <input type="number" id="mail_port" name="MAIL_PORT" class="form-control" placeholder="25 or 2525 or 465 or 587">
            </div>
            <div class="my-2">
               <label for="mail_user_name">Mail User Name</label>
               <input type="text" id="mail_user_name" name="mail_user_name" class="form-control" placeholder="Enter your mail username">
            </div>
            <div class="my-2">
               <label for="mail_password">Mail Password</label>
               <input type="password" id="mail_password" name="mail_password" class="form-control" placeholder="Enter your mail password">
            </div>
            <div class="my-2">
               <label for="mail_encryption">Choose Encryption</label>
               <select name="mail_encryption" id="mail_encryption" class="form-control select">
                  <option value="ssl">SSL</option>
                  <option value="tls">TLS</option>
               </select>
            </div>

            <div class="my-2">
               <label for="mail_from">Mail From Address</label>
               <input type="email" id="mail_from" name="mail_from" class="form-control" placeholder="Enter Mail From">
            </div>
            <div class="my-2">
               <label for="mail_from_name">Mail From Address</label>
               <input type="text" id="mail_from_name" name="mail_from_name" class="form-control" value="{{env('APP_NAME')}}">
            </div>

            <div class="row justify-content-end" >
               <div class="col-lg-4 text-right">
                   <a class="btn btn-lg bg-danger-400 shadow-2 mx-2" href=""><i
                           class="icon-cross2 mr-1"></i>Cancel</a>
                   <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                           class="icon-checkmark4 mr-1"></i>{{ __('Submit') }}</button>
               </div>
           </div>

         </form>
      </div>
   </div>
</x-layouts.master>