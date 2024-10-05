<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Account Settings') }}
        </x-slot>
        <x-slot name="body">

    {{-- <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div> --}}
    <section class="container mt-4">
        <header class="mb-4">
          <h2 class="h5 font-weight-bold text-center">{{ __('Profile Information') }}</h2>
          <p class="text-muted text-center">{{ __("Update your account's profile information and email address.") }}</p>
        </header>
      
        <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="mb-4">
          @csrf
        </form>
      
        <form method="post" action="{{ route('profile.update') }}" class="row">
          @csrf
          @method('patch')
      
          <div class="col-md-6 mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name">
            @error('name')
              <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @enderror
          </div>
      
          <div class="col-md-6 mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" :value="old('email', $user->email)" required autocomplete="username">
            @error('email')
              <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @enderror
      
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
              <div class="mt-2">
                <p class="text-muted">
                  {{ __('Your email address is unverified.') }}
      
                  <button form="send-verification" class="btn btn-link p-0">{{ __('Click here to re-send the verification email.') }}</button>
                </p>
      
                @if (session('status') === 'verification-link-sent')
                  <p class="mt-2 text-success">{{ __('A new verification link has been sent to your email address.') }}</p>
                @endif
              </div>
            @endif
          </div>
      
          <div class="col-12 d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
      
            @if (session('status') === 'profile-updated')
              <p class="text-muted ms-2" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                {{ __('Saved.') }}
              </p>
            @endif
          </div>
        </form>
      </section>
      


      <section class="container mt-4">
        <header class="mb-4">
          <h2 class="h5 font-weight-bold text-center">{{ __('Update Password') }}</h2>
          <p class="text-muted text-center">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
        </header>
      
        <form method="post" action="{{ route('password.update') }}" class="row">
          @csrf
          @method('put')
      
          <div class="col-md-6 mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="update_password_current_password" name="current_password" autocomplete="current-password" required>
            @error('current_password')
              <div class="invalid-feedback">{{ $errors->updatePassword->first('current_password') }}</div>
            @enderror
          </div>
      
          <div class="col-md-6 mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="update_password_password" name="password" autocomplete="new-password" required>
            @error('password')
              <div class="invalid-feedback">{{ $errors->updatePassword->first('password') }}</div>
            @enderror
          </div>
      
          <div class="col-md-6 mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password" required>
            @error('password_confirmation')
              <div class="invalid-feedback">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @enderror
          </div>
      
          <div class="col-12 d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
      
            @if (session('status') === 'password-updated')
              <p class="text-muted ms-2" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                {{ __('Saved.') }}
              </p>
            @endif
          </div>
        </form>
      </section>

      
      <section class="container mt-4">
        <header class="mb-4">
          <h2 class="h5 font-weight-bold text-center">{{ __('Delete Account') }}</h2>
          <p class="text-muted text-center">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>
        </header>
      
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">{{ __('Delete Account') }}</button>
      
        <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="confirm-user-deletion-label" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="confirm-user-deletion-label">{{ __('Are you sure you want to delete your account?') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p class="text-muted">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>
      
                <form method="post" action="{{ route('profile.destroy') }}" class="mt-4">
                  @csrf
                  @method('delete')
      
                  <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{ __('Password') }}" required>
                    @error('password')
                      <div class="invalid-feedback">{{ $errors->userDeletion->first('password') }}</div>
                    @enderror
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="submit" form="delete-user-form" class="btn btn-danger">{{ __('Delete Account') }}</button>
              </div>
            </div>
          </div>
        </div>
      </section>

      
        </x-slot>
</x-data-display.card>
</x-layouts.master>
