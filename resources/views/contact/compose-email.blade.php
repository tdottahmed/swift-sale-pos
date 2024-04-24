<x-layouts.master>
    <x-data-display.card>
        <x-slot name="Heading">
            {{ __('Contacts') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{route('contact.sendEmail')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
                <div class="form-group">
                    <label for="to">To</label>
                    <input type="email" name="to" id="to" value="{{$contact->email}}"  class="form-control">
                    <input type="hidden" name="recipientFirstName" value="{{$contact->first_name}}">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="attachment">Attacthment</label>
                    <input type="file" name="attachment" id="attachment" class="form-control">
                </div>

                <div class="row justify-content-end mr-1">
                    <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                            class="icon-checkmark4 mr-1 "></i>{{ __('Submit') }}</button>
                </div>
            </form>
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
</x-layouts.master>
