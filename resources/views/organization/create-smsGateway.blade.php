<x-layouts.master>
   <div class="card">
      <div class="card-body">
         <form action="{{route('sms.store')}}" method="POST" class="form-group">
            @csrf
            <div class="my-2">
               <input type="hidden"  name="types[]" class="form-control" value="TWILIO_SID">
               <label for="TWILIO_SID">Twilio Sid</label>
               <input type="text" id="TWILIO_SID" name="TWILIO_SID" class="form-control" value="{{env('TWILIO_SID')}}">
            </div>
            <div class="my-2">
               <input type="hidden"  name="types[]" class="form-control" value="TWILIO_TOKEN">
               <label for="TWILIO_TOKEN">Twilio Token</label>
               <input type="text" id="TWILIO_TOKEN" name="TWILIO_TOKEN" class="form-control" value="{{env('TWILIO_TOKEN')}}">
            </div>
            <div class="my-2">
               <input type="hidden" name="types[]" class="form-control" value="TWILIO_FROM">
               <label for="mail_user_name">Twilio From Number</label>
               <input type="text" id="TWILIO_FROM" name="TWILIO_FROM" class="form-control" value="{{env('TWILIO_FROM')}}">
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