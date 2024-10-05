<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Products') }}
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Current Stock') }}</th>
                        <th>{{ __('Image') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Product Type') }}</th>
                        <th>{{ __('Barcode') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if ($product->product_type == 'variable')
                                    {{ $product->variations->sum('stock') }}
                                @else
                                    {{ $product->opening_stock }}
                                @endif
                            </td>
                            <td><img src="{{ imagePath($product->image) }}" height="120" alt="{{ $product->name }}">
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->product_type }}</td>
                            <td class="bg-white">
                                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($product->sku, 'C128') }}"
                                    alt="barcode" />
                            </td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="dropdown-item"><i class="icon-pencil7"></i>
                                                {{ __('Edit Product') }}</a>
                                            <a href="{{ route('product.show', $product->id) }}"
                                                class="dropdown-item"><i class="icon-eye"></i>{{ __('View Product') }}
                                            </a>
                                            <form style="display:inline"
                                                action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this product?')){ this.closest('form').submit(); }"
                                                    class="dropdown-item" title="Delete product">
                                                    <i class="icon-trash-alt"></i>{{ __('Delete Product') }}
                                                </button>
                                            </form>
                                            <a href="{{ route('label.print', $product->id) }}" class="dropdown-item"><i
                                                    class="icon-printer"></i> {{ __('Print Label') }}</a>
                                            <button type="button" class="dropdown-item"
                                                onclick="openModal('{{ route('product.addImage', $product->id) }}', 'Add Product Image')">
                                                <i class="icon-images2"></i>{{ __('Add Images') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('product.create') }}" class="btn bg-indigo-800"><i class="icon-plus2"></i>
                {{ __('Create Product') }}</a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
