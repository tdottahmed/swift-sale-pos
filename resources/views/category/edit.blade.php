<x-data-entry.form action="{{ route('category.update', $category->id) }}" :hasFile="true" method='PATCH'>

    <x-data-entry.input type="text" name="title" value="{{ $category->title }}" />

    <x-data-entry.input-file name="image" label="Choose File" />

    <img class="mt-1" src="{{imagePath($category->image)}}" width="100" height="70"
        alt="no image">
</x-data-entry.form>
