
<x-data-entry.form action="{{ route('category.store') }}" :hasFile='true'>
                    
    <x-data-entry.input type="text" name="title" placeholder="Enter Category Title"/>
    <x-data-entry.input-file  name="image" label="Choose File"/>
</x-data-entry.form>
 