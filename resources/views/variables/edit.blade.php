<x-data-entry.form action="{{route('variables.update',$variable->id)}}" method="PATCH">
    <div class="form-group">
        <label for="title">Variation Name:*</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $variable->title }}"
            placeholder="Variation Name">
    </div>
    <div class="form-group variations">
        <label for="variationValues">Add variation values:*</label>
        @foreach (json_decode($variable->values) as $value)
            <div class="d-flex justify-content-between align-items-center mt-2">
                <input type="text" class="form-control" name="values[]" value="{{ $value }}"
                    placeholder="Add variation value">
                <span class="ml-2 btn btn-danger remove-btn cursor-pointer"><i class="icon-cross2"></i></span>
            </div>
        @endforeach
    </div>
    <div class="mb-2 text-right">
        <button class="btn btn-primary" type="button" id="variation_add"><i
                class="icon-plus3"></i></button>
    </div>
</x-data-entry.form>

<script>
    $('#variation_add').click(function() {
        let html = `
       <div class="d-flex justify-content-between align-items-center mt-2">
          <input type="text" class="form-control" name="values[]" placeholder="Add variation value">
          <span class="ml-2 btn btn-danger remove-btn"><i class="icon-cross2"></i></span>
       </div>`;
        $('.variations').append(html);
    });

    $('.variations').on('click', '.remove-btn', function() {
        $(this).parent().remove();
    });
</script>