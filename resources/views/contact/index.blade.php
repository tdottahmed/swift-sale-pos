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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Level</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->fname }}</td>
                                <td>{{ $contact->lname }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->address }}</td>
                                <td>{{ $contact->city }}</td>
                                >
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('contacts.edit', $contact->id) }}"
                                                    class="dropdown-item " data-toggle="modal"
                                                    data-target="#editContact"><i class="icon-pencil7"></i> Edit
                                                    Contact</a>
                                                <a href="{{ route('contacts.show', $contact->id) }}"
                                                    class="dropdown-item" data-toggle="modal"
                                                    data-target="#showContact"><i class="icon-eye"></i> View contact</a>
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
                        @endforeach


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
    @include('contact.edit-modal')
    @include('contact.show-modal')
</x-layouts.master>
