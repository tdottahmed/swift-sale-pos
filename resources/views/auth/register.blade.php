<x-layouts.guest>
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 py-5">
            <div class="card py-5">
                <div class="card-heade text-center">
                    <h3>Register Account</h3>
                </div>
                <div class="card-body justify-content-center py-2 mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                              <x-auth-session-status class="mb-4" :status="session('status')" />      
                              <form method="POST" action="{{ route('password.email') }}">
                                  @csrf
                                  <div>
                                      <div class="form-group">
                                          <label for="name">{{__('Name')}}</label>
                                          <input type="text" class="form-control" name="name" :value="old('name')" required autofocus autocomplete="name">
                                          <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                      <div class="form-group">
                                          <label for="email">{{__('Email')}}</label>
                                          <input type="email" class="form-control" name="email" :value="old('email')" required autofocus>
                                          <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                      </div>
                                      <div class="form-group">
                                          <label for="password">{{__('Password')}}</label>
                                          <input type="password" class="form-control" name="password" :value="old('password')" required autofocus>
                                          <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                      </div>
                                      <div class="form-group">
                                          <label for="password_confirmation">{{__('Confirm Password')}}</label>
                                          <input type="password_confirmation" class="form-control" name="password_confirmation" :value="old('password_confirmation')" required autofocus>
                                          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                      </div>
                                      <a class="text-bule underline" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                  </div>
                                    <div class="row mt-3">
                                        <button class="btn btn-primary btn-block"> {{ __('Register') }}</button>
                                    </div>
                              </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
