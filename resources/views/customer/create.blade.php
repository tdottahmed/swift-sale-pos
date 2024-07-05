<x-data-entry.form action="{{ route('customer.store') }}">
   <x-data-entry.input type="text" name="fname" placeholder="Enter First Name"/>
   <x-data-entry.input type="text" name="lname" placeholder="Enter last name"/>
   <x-data-entry.input type="email" name="email" placeholder="Enter Email"/>
   <x-data-entry.input type="text" name="phone" placeholder="Enter phone"/>
   <x-data-entry.input type="text" name="address" placeholder="Ring street 12, building D, flat #67"/>
   <x-data-entry.input type="text" name="city" placeholder="Enter city"/>
   <x-data-entry.input type="text" name="state" placeholder="Enter state"/>
</x-data-entry.form>