<x-data-entry.form action="{{ route('supplier.update', $supplier->id) }}" method="PATCH">
   <x-data-entry.input type="text" name="fname" placeholder="Enter First Name" value="{{$supplier->fname}}"/>
   <x-data-entry.input type="text" name="lname" placeholder="Enter last name" value="{{$supplier->lname}}"/>
   <x-data-entry.input type="email" name="email" placeholder="Enter Email" value="{{$supplier->email}}"/>
   <x-data-entry.input type="text" name="phone" placeholder="Enter phone" value="{{$supplier->phone}}"/>
   <x-data-entry.input type="text" name="vat_no" placeholder="Enter VAT number" value="{{$supplier->vat_no}}"/>
   <x-data-entry.input type="text" name="address" placeholder="Enter address" value="{{$supplier->address}}"/>
   <x-data-entry.input type="text" name="city" placeholder="Enter city" value="{{$supplier->city}}"/>
   <x-data-entry.input type="text" name="state" placeholder="Enter state" value="{{$supplier->state}}"/>
   <x-data-entry.input type="text" name="postal_code" placeholder="Enter Postal Code" value="{{$supplier->postal_code}}"/>
   <x-data-entry.input type="text" name="country" placeholder="Enter country" value="{{$supplier->country}}"/>
</x-data-entry.form>