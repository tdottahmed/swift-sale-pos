<!DOCTYPE html>
<html>
<head>
    <title>Comment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

<div class="row m-1">
    <div class="col-lg-3">
        <div>
            <label for="">
                <p><strong>Blog Title  :</strong> {{$blog->title }}</p>
            </label>
        </div>
    </div>
    <div class="col-lg-3">
        <div>
            @if ($blog->image)
                <img src="{{ imagePath($blog->image)}}" 
                    alt="blog Image"width="100" height="100" height="auto">
            @else
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDpYgKX6Na9EAfhKgjLD4iyPugeNE0wggdkw&usqp=CAU"
                    width="250" height="200" alt="Default Image">
            @endif
        </div>
    </div>
</div>

<div class="container">
    <h1>Comment</h1>
    <a class="btn btn-success" href="javascript:void(0)" id="createNewComment">Create New Comment</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Comment</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="commentForm" name="commentForm" class="form-horizontal">
                    <input type="hidden" name="blog_id" id="blog_id" value="{{$blog->id}}">
                    <input type="hidden" name="comment_id" id="comment_id">
                    <div class="form-group">
                        <label for="comment" class="col-sm-2 control-label">Comment</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="comment" name="comment" placeholder="Enter Comment" maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                            <textarea id="description" name="description" placeholder="Enter Description" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Initialize DataTable
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
            $('#blog_id').val(data.blog_id);
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
</script>
</body>
</html>
