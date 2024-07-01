<form action="{{ $action }}" method="POST" @if($hasFile) enctype="multipart/form-data" @endif>
    @csrf
    @if(in_array($method, ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif
    {{ $slot }}
    <div class="text-right">
        <x-action.cancel-btn/>
        <x-action.submit-btn/>
    </div>
</form>
