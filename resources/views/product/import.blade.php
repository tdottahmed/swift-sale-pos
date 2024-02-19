<x-layouts.master>
   <x-data-display.card>
      <x-slot name="heading">
         Import Product Excel
      </x-slot>
      <x-slot name="body">
         <form action="{{route('excel.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <label for="excel">Chose your Excel File</label>
               <input type="file" name="excel" id="excel" class="form-control mt-2" required>
            </div>
            <div class="text-center">
               <button class="btn btn-lg btn-block bg-indigo-600"><i class="icon-check mr-2"></i>Save</button>
            </div>
         </form>
      </x-slot>
   </x-data-display.card>
</x-layouts.master>