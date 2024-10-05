<div class="list-icons">
    <div class="dropdown">
        <a href="#" class="list-icons-item" data-toggle="dropdown">
            <i class="icon-menu9"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            @foreach ($actions as $action)
                @if (isset($action['method']) && strtolower($action['method']) === 'delete')
                    <form style="display:inline" action="{{ route($action['route'], $action['params'] ?? []) }}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <button
                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')){ this.closest('form').submit(); }"
                            class="dropdown-item" title="{{ $action['label'] }}">
                            <i class="{{ $action['icon'] }}"></i> {{ $action['label'] }}
                        </button>
                    </form>
                @else
                    <a href="{{ route($action['route'], $action['params'] ?? []) }}" class="dropdown-item">
                        <i class="{{ $action['icon'] }}"></i> {{ $action['label'] }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
