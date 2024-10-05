<x-layouts.guest>
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 mt-3">
                <img src="{{ asset('assets/login-banner.jpg') }}" alt="" class="img-fluid">
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card">
                    <div class="card-body py-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <img src="{{ asset('assets/login-icon.svg') }}" alt="SVG Image">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center px-2">
                            <button type="button" class="btn btn-sm bg-indigo-800" id="admin">Admin</button>
                            <span class="mx-2"></span>
                            <button type="button" class="btn btn-sm bg-teal-800" id="manager">Pos Manager</button>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div>
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    :value="old('email')">

                            </div>

                            <div class="mt-4">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    :value="old('email')">
                            </div>
                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <div class="row justify-content-between">
                                    <div class="col-lg-7">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input type="checkbox" name="remember">
                                            <span
                                                class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-5 text-right">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                href="{{ route('password.request') }}">
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
                            <a href="{{ route('register') }}" class="btn btn-secondary btn-block">
                                {{ __('Register') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#admin').on('click', function() {
                    $('#email').val('superadmin@gmail.com');
                    $('#password').val('12345678');
                });
                $('#manager').on('click', function() {
                    $('#email').val('posmanager@example.com');
                    $('#password').val('12345678');
                });
            });
        </script>
    @endpush
</x-layouts.guest>
