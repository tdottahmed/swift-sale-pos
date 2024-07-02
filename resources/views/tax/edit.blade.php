<x-data-entry.form action="{{ route('tax.update', $tax->id) }}" :hasFile="true" method='PATCH'>

    <x-data-entry.input type="text" name="title" value="{{ $tax->title }}"/>
    <x-data-entry.input type="text" name="value"  value="{{ $tax->value }}"/>
      
</x-data-entry.form>
