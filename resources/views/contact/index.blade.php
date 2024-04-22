<x-layouts.master>
    <x-data-display.card>
        <x-slot name="Heading">
            {{ __('Contacts') }}
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Contact Type</th>
                            <th>Contact ID</th>
                            <th>Name</th>
                            <th>Business Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Shipping Address</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($contact->contactType)
                                        {{ $contact->contactType->title }}
                                    @endif
                                </td>
                                <td>{{ $contact->contact_id }}</td>
                                <td>{{ $contact->prefix }} {{ $contact->first_name }} {{ $contact->middle_name }}
                                    {{ $contact->last_name }}</td>
                                <td>{{ $contact->business_name }}</td>
                                <td>{{ $contact->mobile }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>{{ $contact->shipping_address }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('contacts.edit', $contact->id) }}"
                                                    class="dropdown-item " data-toggle="modal"
                                                    data-target="#editContact"><i class="icon-pencil7"></i>
                                                    Edit
                                                    Contact</a>
                                                <a href="{{ route('contacts.show', $contact->id) }}"
                                                    class="dropdown-item" data-toggle="modal"
                                                    data-target="#showContact"><i class="icon-eye"></i> View
                                                    contact</a>
                                                <a href="{{ route('contact.composeEmail', $contact->id) }}"
                                                    class="dropdown-item"><i class="icon-envelop3"></i> Instant Mail
                                                </a>
                                                <a href="{{ route('contact.composeSms', $contact->id) }}"
                                                    class="dropdown-item"><i class="icon-envelop2"></i> Instant SMS
                                                </a>
                                                <form style="display:inline"
                                                    action="{{ route('contacts.destroy', $contact->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this contact?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete contact">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="10">No contacts found.</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <span
                class="btn 
         btn-sm 
         bg-success 
         border-2 
         border-success
         btn-icon 
         rounded-round 
         legitRipple 
         shadow 
         mr-1"
                data-toggle="modal" data-target="#createContact"><i class="icon-plus2"></i></span>
        </x-slot>
    </x-data-display.card>
    @include('contact.create-modal')
    {{-- @include('contact.edit-modal') --}}
    {{-- @include('contact.show-modal') --}}
</x-layouts.master>
