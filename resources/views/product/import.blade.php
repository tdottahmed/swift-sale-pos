<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Import Product Excel
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('excel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="excel">Chose your Excel File</label>
                    <input type="file" name="excel" id="excel" class="file-input"
                        data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false"
                        data-show-upload="false" data-fouc required>
                </div>
                <div class="text-center">
                    <button class="btn btn-lg btn-block bg-indigo-600"><i class="icon-check mr-2"></i>Save</button>
                </div>
            </form>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
