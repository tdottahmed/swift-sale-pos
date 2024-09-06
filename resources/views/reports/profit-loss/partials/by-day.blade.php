<x-data-display.table class="table-striped table-hover">
    <x-slot name="header">
        <tr>
            <th>{{ __('SL') }}</th>
            <th>{{ __('Day Name') }}</th>
            <th>{{ __('Total Quantity Sold') }}</th>
            <th>{{ __('Total Sales Value') }}</th>
            <th>{{ __('Total Profit') }}</th>
        </tr>
    </x-slot>
    <x-slot name="body">
        @foreach ($salesData as $index => $sale)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $sale->day_name }}</td>
                <td>{{ number_format($sale->total_quantity) }}</td>
                <td>{{ number_format($sale->total_sales, 2) }}</td>
                <td>{{ number_format($sale->total_profit, 2) }}</td>
            </tr>
        @endforeach
    </x-slot>
</x-data-display.table>
