<x-data-entry.form action="{{ route('customer.update', $customer->id) }}" method="PATCH">
    <x-data-entry.input type="text" name="fname" placeholder="Enter First Name" value="{{ $customer->fname }}" />
    <x-data-entry.input type="text" name="lname" placeholder="Enter last name" value="{{ $customer->lname }}" />
    <x-data-entry.input type="email" name="email" placeholder="Enter Email" value="{{ $customer->email }}" />
    <x-data-entry.input type="text" name="phone" placeholder="Enter phone" value="{{ $customer->phone }}" />
    <x-data-entry.input type="text" name="address" placeholder="Enter address" value="{{ $customer->address }}" />
    <x-data-entry.input type="text" name="city" placeholder="Enter city" value="{{ $customer->city }}" />
    <x-data-entry.input type="text" name="state" placeholder="Enter state" value="{{ $customer->state }}" />
</x-data-entry.form>
