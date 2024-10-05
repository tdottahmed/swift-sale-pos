<x-data-entry.form action="{{ route('supplier.store') }}">
    <x-data-entry.input type="text" name="fname" placeholder="Enter First Name" attribte="readonly"/>
    <x-data-entry.input type="text" name="lname" placeholder="Enter last name"/>
    <x-data-entry.input type="email" name="email" placeholder="Enter Email"/>
    <x-data-entry.input type="text" name="phone" placeholder="Enter phone"/>
    <x-data-entry.input type="text" name="vat_no" placeholder="Enter VAT number"/>
    <x-data-entry.input type="text" name="address" placeholder="Enter address"/>
    <x-data-entry.input type="text" name="city" placeholder="Enter city"/>
    <x-data-entry.input type="text" name="state" placeholder="Enter state"/>
    <x-data-entry.input type="text" name="postal_code" placeholder="Enter Postal Code"/>
    <x-data-entry.input type="text" name="country" placeholder="Enter country"/>
</x-data-entry.form>