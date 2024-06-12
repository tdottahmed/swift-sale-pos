
  $(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //index
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('comments.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'comment', name: 'comment'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#createNewComment').click(function () {
        $('#saveBtn').val("create-comment");
        $('#comment_id').val('');
        $('#commentForm').trigger("reset");
        $('#modelHeading').html("Create New Comment");
        $('#ajaxModel').modal('show');
    });

    $('body').on('click', '.editComment', function () {
        var comment_id = $(this).data('id');
        $.get("{{ route('comments.index') }}" +'/' + comment_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Comment");
            $('#saveBtn').val("edit-comment");
            $('#ajaxModel').modal('show');
            $('#comment_id').val(data.id);
            $('#comment').val(data.comment);
            $('#description').val(data.description);
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
            data: $('#commentForm').serialize(),
            url: "{{ route('comments.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#commentForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
                $('#saveBtn').html('Save changes');
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save changes');
            }
        });
    });


    //delete
    $('body').on('click', '.deleteComment', function () {
        var comment_id = $(this).data("id");
        if (confirm("Are You sure want to delete?")) {
            $.ajax({
                type: "DELETE",
                url: "{{ route('comments.store') }}"+'/'+comment_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
  });
