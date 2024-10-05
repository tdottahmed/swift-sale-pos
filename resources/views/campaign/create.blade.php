<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Create Campaign') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('campaign.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Description</label>
                    <div class="col-sm-9">
                        <textarea name="description" id="description" class="form-control" placeholder="Enter your campaign descripion here"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Sms Body</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="body" id="body" cols="30" rows="10"
                            placeholder="Type your message here..."></textarea>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Campagin Type</label>
                    <div class="col-sm-9">
                        <select name="campaign_type" id="campaign_type" class="form-control select">
                            {{-- <option value="" disabled selected>Chose Campaign Type</option> --}}
                            <option value="email">Email</option>
                            <option value="sms">SMS</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Chose Your Conatct Type</label>
                    <div class="col-sm-9">
                        <select name="contact_type_id" id="contact_type_id" class="form-control select">
                            <option value="" disabled selected>Chose Your Conatct Type</option>
                            <option value="3">Supplier and Customer Both</option>
                            <option value="1">Supplier</option>
                            <option value="2">Customer</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row" id="cc_field">
                    <label class="col-form-label col-sm-3">CC</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="cc" id="cc">
                    </div>
                </div>
                <div class="form-group row" id="bcc_field">
                    <label class="col-form-label col-sm-3">BCC</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="bcc" id="bcc">
                    </div>
                </div>


                <div class="form-group row" id="attachment_field">
                    <label class="col-form-label col-sm-3">Attachment</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="attachment" id="attachment">
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i
                                class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1"></i>{{ __('Save') }}</button>
                    </div>
                </div>

            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('campaign.index') }}"
                class="btn 
           btn-sm bg-indigo 
           border-2 
           border-indigo 
           btn-icon 
           rounded-round 
           legitRipple 
           shadow 
           mr-1"><i
                    class="icon-list"></i></a>
        </x-slot>
    </x-data-display.card>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#campaign_type').change(function() {
                    var selectedOption = $(this).val();
                    if (selectedOption === 'email') {
                        $('#attachment_field').show();
                        $('#cc_field').show();
                        $('#bcc_field').show();
                    } else {
                        $('#attachment_field').hide();
                        $('#cc_field').hide();
                        $('#bcc_field').hide();
                    }
                });
            });
        </script>
    @endpush
</x-layouts.master>