<x-layouts.master>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Purchse and Sale</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <x-data-display.card-toolbar />
            <x-data-display.table>
                <x-slot name="header">
                    <tr>
                        <th>{{ __('product Name') }}</th>
                        <th>{{ __('SKU') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Current Stock') }}</th>
                        <th>{{ __('Stock Value') }}</th>
                        <th>{{ __('Days in Stock') }}</th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->category }}</td>
                            <td>
                                @if ($product->product_type == 'variable')
                                    {{ $product->variations->sum('stock') }}
                                @else
                                    {{ $product->opening_stock }}
                                @endif
                            </td>
                            <td>
                                @if ($product->product_type == 'variable')
                                    @php
                                        $stockValue = 0;
                                        foreach ($product->variations as $variation) {
                                            $stockValue = $variation->stock * $variation->purchase_inc;
                                        }
                                    @endphp
                                    {{ $stockValue }}
                                @else
                                    {{ $product->opening_stock * $product->purchase_price_including_tax }}
                                @endif
                            </td>
                            <td>
                                {{ calculateDaysPassed($product->created_at) }}
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-data-display.table>
        </div>
    </div>
</x-layouts.master>
