<x-layouts.guest>
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 py-5">
            <div class="card py-5">
                <div class="card-header text-center py-3">
                    <h3>Reset Password</h3>
                </div>
                <div class="card-body align-items-center justify-content-center text-center py-2 mt-5">
                   <div class="alert alert-info">
                    <h4 >{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</h4>
                   </div>
                    <div class="mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                              <x-auth-session-status class="mb-4" :status="session('status')" />      
                              <form method="POST" action="{{ route('password.email') }}">
                                  @csrf
                                  <!-- Email Address -->
                                  <div>
                                      <div class="form-group">
                                          <label for="email">{{__('Email')}}</label>
                                          <input type="email" class="form-control" name="email" :value="old('email')" required autofocus>
                                          <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                      </div>
                                  </div>
                                    <div class="row mt-3">
                                        <button class="btn btn-primary btn-block"> {{ __('Email Password Reset Link') }}</button>
                                    </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
