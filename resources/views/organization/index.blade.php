<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Organizations') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('organization.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-data-entry.input type="text" name="name" placeholder="Enter organization name"
                    :value="organizationDetails('name') ?? ''" />
                <x-data-entry.input type="text" name="phone" placeholder="Enter organization phone"
                    :value="organizationDetails('phone') ?? ''" />
                <x-data-entry.input type="email" name="email" placeholder="Enter organization email"
                    :value="organizationDetails('email') ?? ''" />
                <x-data-entry.text-area label="Address" name="address" placeholder="Enter organization address"
                    :value="organizationDetails('address') ?? ''" />
                <x-data-entry.input type="text" name="city" placeholder="Enter organization city"
                    :value="organizationDetails('city') ?? ''" />
                <x-data-entry.input type="text" name="state" placeholder="Enter organization state"
                    :value="organizationDetails('state') ?? ''" />
                <x-data-entry.input type="text" name="postal_code" placeholder="Enter organization postal code"
                    :value="organizationDetails('postal_code') ?? ''" />
                <x-data-entry.input type="text" name="country" placeholder="Enter organization country"
                    :value="organizationDetails('country') ?? ''" />
                <x-data-entry.input type="text" name="website" placeholder="Enter organization website"
                    :value="organizationDetails('website') ?? ''" />
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image-fluid">
                            <img src="{{ imagePath(organizationDetails('logo')) }}"
                                alt="{{ organizationDetails('name') }}" height="70">
                        </div>
                        <label for="logo">Logo</label>
                        <input type="file" id="logo" class="form-control h-auto" name="logo">
                    </div>
                    <div class="col-lg-6">
                        <div class="image-fluid">
                            <img src="{{ imagePath(organizationDetails('favicon')) }}"
                                alt="{{ organizationDetails('name') }}" height="70">
                        </div>
                        <label for="favicon">Favicon</label>
                        <input type="file" class="form-control h-auto" name="favicon" id="favicon">
                    </div>
                </div>
                <hr>
                <x-data-entry.input type="text" name="facebook" placeholder="Enter organization facebook"
                    :value="organizationDetails('facebook') ?? ''" />
                <x-data-entry.input type="text" name="twitter" placeholder="Enter organization twitter"
                    :value="organizationDetails('twitter') ?? ''" />
                <x-data-entry.input type="text" name="skype" placeholder="Enter organization skype"
                    :value="organizationDetails('skype') ?? ''" />
                <x-data-entry.input type="text" name="linkdein" placeholder="Enter organization linkdein"
                    :value="organizationDetails('linkdein') ?? ''" />
                <x-data-entry.input type="text" name="instgram" placeholder="Enter organization instgram"
                    :value="organizationDetails('instgram') ?? ''" />
                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <button type="button" class="btn btn-lg bg-danger-400 shadow-2">
                            <i class="icon-cross2 mr-1"></i>Cancel</button>
                        <x-action.submit-btn />
                    </div>
                </div>
            </form>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
