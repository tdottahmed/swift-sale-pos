<x-data-entry.form action="{{ route('customer.store') }}">
    <x-data-entry.input type="text" name="name" placeholder="Enter First Name" />
    <x-data-entry.input type="email" name="email" placeholder="Enter Email" />
    <x-data-entry.input type="text" name="phone" placeholder="Enter phone" />
    <x-data-entry.text-area name="address" placeholder="Ring street 12, building D, flat #67"
        label="Customer Address"></x-data-entry.text-area>
    <x-data-entry.input type="text" name="city" placeholder="Enter city" />
</x-data-entry.form>
