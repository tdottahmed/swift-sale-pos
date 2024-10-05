<x-data-entry.form action="{{ route('brand.store') }}" :hasFile="true">
    <x-data-entry.input type="text" name="title" placeholder="Enter Brand Title"/>
    <x-data-entry.input type="file" name="image"/>    
</x-data-entry.form>
