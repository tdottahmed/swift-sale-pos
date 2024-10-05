<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            <h2 class="text-center">{{ __('Contact All Information') }}</h2>
        </x-slot>
        <x-slot name="body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header bg-teal text-white">
                            Basic Information
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li><strong>Contact Type:</strong> {{ $contact->contact_type == 1 ? 'Suppliers' : 'Customers' }}</li>
                                <li><strong>Contact ID:</strong> {{ $contact->contact_id }}</li>
                                <li><strong>Prefix:</strong> {{ $contact->prefix }}</li>
                                <li><strong>First Name:</strong> {{ $contact->first_name }}</li>
                                <li><strong>Middle Name:</strong> {{ $contact->middle_name }}</li>
                                <li><strong>Last Name:</strong> {{ $contact->last_name }}</li>
                                <li><strong>Mobile:</strong> {{ $contact->mobile }}</li>
                                <li><strong>Alternate Contact Number:</strong> {{ $contact->alternate_number }}</li>
                                <li><strong>Landline:</strong> {{ $contact->landline }}</li>
                                <li><strong>Email:</strong> {{ $contact->email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header bg-teal text-white">
                            Address Information
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li><strong>City:</strong> {{ $contact->city }}</li>
                                <li><strong>State:</strong> {{ $contact->state }}</li>
                                <li><strong>Country:</strong> {{ $contact->country }}</li>
                                <li><strong>Zip:</strong> {{ $contact->zip }}</li>
                                <li><strong>Date of Birth:</strong> {{ $contact->date_of_birth }}</li>
                                <li><strong>Assigned To:</strong> {{ $contact->assigned_to }}</li>
                                <li><strong>Address:</strong> {{ $contact->address }}</li>
                                <li><strong>Address2:</strong> {{ $contact->address2 }}</li>
                                <li><strong>Business Name:</strong> {{ $contact->business_name }}</li>
                                <li><strong>Shipping Address:</strong> {{ $contact->shipping_address }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('contacts.index') }}" class="btn btn-sm bg-indigo border-2 border-indigo btn-icon rounded-round legitRipple shadow mr-1">
                <i class="icon-list"></i>
            </a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
