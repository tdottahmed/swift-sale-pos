<button type="button" {{ $attributes->merge(['class' => 'btn bg-indigo-800']) }}
    onclick="openModal('{{ $route }}', '{{ $modalHeaderLabel }}')">
    {{ $buttonLabel }} <i class="icon-plus3 ml-2"></i>
</button>
