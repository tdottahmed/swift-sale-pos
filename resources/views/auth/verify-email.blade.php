<x-layouts.guest>
    <div class="container mt-5">
        <div class="mb-4">
            <h2 class="text-success ">
                {{ __('Thank You for Signing Up!') }}
            </h2>
            <h4 class="text-dark ">
                {{ __("Before you get started, please verify your email address by clicking on the link we just sent to you. If you didn't receive the email, don't worry, we can send you another one.") }}
            </h4>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration. Please check your inbox.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="text-center">
                    <x-primary-button class="bg-dark">
                        <b class="text-white">{{ __('Resend Verification Email') }}</b>
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="btn btn btn-link text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        <b>{{ __('Log Out') }}</b>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.guest>
