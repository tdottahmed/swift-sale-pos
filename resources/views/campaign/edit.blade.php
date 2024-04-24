<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Your Contuct Type') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('campaign.update', $campaign->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title">Title :</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ $campaign->title }}">
                </div>
                <div class="mb-3">
                    <label for="description">Description :</label>
                    <input type="text" class="form-control" name="description" id="description"
                        value="{{ $campaign->description }}">
                </div>
                <div class="mb-3">
                    <label for="description">Body :</label>
                    <input type="text" class="form-control" name="body" id="body"
                        value="{{ $campaign->body }}">
                </div>
                <div class="mb-3">
                    <label for="description">Attachment :</label>
                    <input type="file" class="form-control" name="attachment" id="attachment"
                        value="{{ $campaign->attachment }}">
                </div>
                <div class="mb-3">
                    <label for="description">Campagin Type :</label>
                    <input type="text" class="form-control" name="campagin_type" id="campagin_type"
                        value="{{ $campaign->campagin_type }}">
                </div>
                
                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i
                                class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1"></i>{{ __('Update') }}</button>
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
</x-layouts.master>
