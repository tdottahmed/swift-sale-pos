<x-data-entry.form action="{{ route('brand.store') }}" :hasFile="true">
    <x-data-entry.input type="text" name="title" value="{{$brand->title}}"/>
    <x-data-entry.input type="file" name="image"/>
    <img src="{{imagePath($brand->image)}}" class="pb-3" height="300" width="300" alt="{{$brand->title}}">    
</x-data-entry.form>
