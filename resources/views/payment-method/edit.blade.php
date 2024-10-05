<x-data-entry.form action="{{ route('payment-method.update', $paymentMethod->id) }}" method='PATCH'>
    <x-data-entry.input type="text" name="title" value="{{$paymentMethod->title}}" selected="{{$paymentMethod->id}}"/>     
</x-data-entry.form>

