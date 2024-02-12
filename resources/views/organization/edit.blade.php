<x-layouts.master>
    <div class="card ">
        <div class="card-header bg-teal">
            <h2>{{ __('Update Your Organization Info') }}</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('organization.update', $organization->id) }} " method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ $organization->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo">
                            <img class="mt-1" src="{{ asset('storage/organization') . '/' . $organization->logo }}"
                                width="100" height="70" alt="no image">
                        </div>
                        <div class="mb-3">
                            <label for="favicon">Favicon</label>
                            <input type="file" class="form-control" name="favicon" id="favicon">
                            <img class="mt-1" src="{{ asset('storage/organization') . '/' . $organization->favicon }}"
                                width="100" height="70" alt="no image">
                        </div>
                        <div class="mb-3">
                            <label for="footer_logo">Footer Logo:</label>
                            <input type="file" class="form-control" name="footer_logo" id="footer_logo">
                            <img class="mt-1"
                                src="{{ asset('storage/organization') . '/' . $organization->footer_logo }}"
                                width="100" height="70" alt="no image">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="email"
                                value="{{ $organization->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                value="{{ $organization->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address:</label>
                            <textarea name="address" id="address" class="form-control" rows="5">{{ $organization->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="mb-3">
                            <label for="facebook">Facebook:</label>
                            <input type="text" class="form-control" name="facebook" id="facebook"
                                value="{{ $organization->facebook }}">
                        </div>
                        <div class="mb-3">
                            <label for="twitter">Twitter:</label>
                            <input type="text" class="form-control" name="twitter" id="twitter"
                                value="{{ $organization->twitter }}">
                        </div>
                        <div class="mb-3">
                            <label for="skype">Skype:</label>
                            <input type="text" class="form-control" name="skype" id="skype"
                                value="{{ $organization->skype }}">
                        </div>
                        <div class="mb-3">
                            <label for="linkdein">Linkdein:</label>
                            <input type="text" class="form-control" name="linkdein" id="linkdein"
                                value="{{ $organization->linkdein }}">
                        </div>
                        <div class="mb-3">
                            <label for="currency">Currency:</label>
                            <input type="text" class="form-control" name="currency" id="currency"
                                value="{{ $organization->currency }}">
                        </div>
                        <div class="mb-3">
                            <label for="time_zone">Time Zone:</label>
                            <input type="text" class="form-control" name="time_zone" id="time_zone"
                                value="{{ $organization->time_zone }}">
                        </div>
                        <div class="mb-3">
                            <label for="telephone_no">TelePhone:</label>
                            <input type="text" class="form-control" name="telephone_no" id="telephone_no"
                                value="{{ $organization->telephone_no }}">
                        </div>
                    </div>
                </div>



                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-info" value="Submit">
                </div>

            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('organization.index') }}" class="btn btn-success btn-sm">List</a>
        </div>
    </div>


</x-layouts.master>
