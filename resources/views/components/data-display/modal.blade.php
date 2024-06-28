<div id="{{ $id }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header {{ $headerColor }}">
                <h6 class="modal-title">{{ $title }}</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
