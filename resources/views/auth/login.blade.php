<x-layouts.guest>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 mt-3">
                <img src="{{asset('assets/login-banner.jpg')}}" alt="" class="img-fluid"> 
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card">
                    <div class="card-body py-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <img src="{{ asset('assets/login-icon.svg') }}" alt="SVG Image" > 
                            </div>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                    
                            <!-- Email Address -->
                            <div>
                                <label for="email">{{__('Email')}}</label>
                                <input type="email" class="form-control" name="email" :value="old('email')">

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                    
                            <!-- Password -->
                            <div class="mt-4">
                                <label for="password">{{__('Password')}}</label>
                                <input type="password" class="form-control" name="password" :value="old('email')">                   
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                    
                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <div class="row justify-content-between">
                                    <div class="col-lg-7">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input  type="checkbox" name="remember">
                                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-5 text-right">
                                        @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                @endif
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row mt-3">
                                    <button class="btn btn-primary btn-block"> {{ __('Log in') }}</button>
                            </div>
                            
                        </form>
                        <div class="row mt-3">
                            <a href="#" class="btn btn-secondary btn-block"> {{ __('Register') }}</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layouts.guest>

