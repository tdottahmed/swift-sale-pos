<x-layouts.guest>
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-8 mt-3">
                <img src="{{asset('assets/login-banner.jpg')}}" alt="" class="img-fluid"> 
            </div>
            <div class="col-lg-4 mt-3">

            <div class="card">
                <div class="card-header text-center">
                    <h3 class="text-info"><b>Register Your Account Here</b></h3>
                </div>
                <div class="card-body mt-3">
                        <div class="row justify-content-center">
                              <x-auth-session-status class="mb-4" :status="session('status')" />      
                              <form method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data">
                                  @csrf
                                      <div class="form-group">
                                          <input type="text" class="form-control" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Your Name">
                                          <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                      <div class="form-group">
                                          <input type="email" class="form-control" name="email" :value="old('email')" required autofocus placeholder="Enter Your Email">
                                          <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                      </div>
                                      <div class="form-group image-preview">

                                        <label for="image"><b>{{__('Upload Your Image')}}</b></label>
                                        <div style="width: 278px;
                                        height: 250px;
                                        overflow: auto;
                                        border: 1px solid #ccc;" id="preview">
                                            <img style=" display: block;
                                            max-width: 100%;
                                            height: auto;" src="{{ asset(\App\Models\User::PLACEHOLDER_IMAGE_PATH) }}" alt="" class="object-cover rounded-3xl">
                                        </div>
                                          
                                        <input type="file" id="upload" class="form-control" name="image" :value="old('image')"  class="image-upload-input px-4 py-2 border focus:border-gray-900 w-full" accept="image/*">
                                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                      </div>
                                      <div class="form-group">
                                          <input type="password" class="form-control" name="password" :value="old('password')" required autofocus placeholder="Enter Password">
                                          <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                      </div>
                                      <div class="form-group">
                                          <input type="password" class="form-control" name="password_confirmation" :value="old('password_confirmation')" required autofocus placeholder="Enter Confirm Password">
                                          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                      </div>
                                      <a class="text-bule underline" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                    <div class="row mt-3">
                                        <button class="btn btn-primary btn-block"> {{ __('Register') }}</button>
                                    </div>
                              </form>
                            
                        </div>
                    </div>
            </div>
       
            </div>
    </div>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <script>
        $(document).ready(()=>{
            $('.image-upload-input').change(function(){
                const file = this.files[0];
                const previewer = $(this).closest('.image-preview').find('img');

                if(file)(
                    let reader = new FileReader();
                    reader.onload = function(event){
                        previewer.attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                )
            });
        });
    </script>



{{-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Upload and Display</title>
<style>
  #preview {
    max-width: 300px;
    margin-top: 20px;
  }
</style>
</head>
<body> --}}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('#upload').on('change', function(e){
    var file = e.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e){
      $('#preview').html('<img src="'+e.target.result+'" alt="Image preview">');
    }
    reader.readAsDataURL(file);
  });
});
</script>



</x-layouts.guest>
