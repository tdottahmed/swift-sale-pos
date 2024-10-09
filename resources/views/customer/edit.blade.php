<x-data-entry.form action="{{ route('customer.update', $customer->id) }}" method="PATCH">
    <x-data-entry.input type="text" name="name" placeholder="Enter First Name" :value="$customer->name" />
    <x-data-entry.input type="email" name="email" placeholder="Enter Email" :value="$customer->email" />
    <x-data-entry.input type="text" name="phone" placeholder="Enter phone" :value="$customer->phone" />
    <x-data-entry.text-area name="address" label="Customer Address" :value="$customer->address"></x-data-entry.text-area>
    <x-data-entry.input type="text" name="city" placeholder="Enter city" :value="$customer->city" />
</x-data-entry.form>
