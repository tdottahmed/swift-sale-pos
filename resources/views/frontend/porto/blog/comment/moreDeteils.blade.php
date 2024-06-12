<x-frontend.porto.layout.master>




    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-black">Blog Details</h3>
                        <hr>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for=""><strong>Blog Title:</strong></label>
                        <p>{{ $blog->title }}</p>

                        @if ($blog->image)
                        <div class="annual-single-event">
                            <div class="event-content">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="annual-img">
                                            <a href="{{ imagePath($blog->image) }}">
                                                <img class="img-fluid d-block mx-auto" src="{{ imagePath($blog->image) }}" alt="slider image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDpYgKX6Na9EAfhKgjLD4iyPugeNE0wggdkw&usqp=CAU" width="250" height="200" alt="Default Image">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Blog Comments</h3>

                            <hr>
                            <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addStudentModal">
                                <i class="fas fa-user-plus"></i>    Add Comments
                                </button>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        {{-- <th><i class="fas fa-user"></i> Sri</th>
                                        <th><i class="fas fa-user"></i> Blog ID</th> --}}
                                        <th><i class="fas fa-user"></i> Comment</th>
                                        <th><i class="fas fa-envelope"></i> Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        @if ($comment->blog_id == $blog->id)
                                            <tr>
                                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                                {{-- <td>{{ $comment->blog_id }}</td> --}}
                                                <td>{{ $comment->comment }}</td>
                                                <td>{{ $comment->description }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>














            
            {{-- <h1>{{ $blog->id }}</h1> --}}
            
            <!-- Add Student Modal -->
            <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="addStudentModalLabel"><i class="fas fa-user-plus"></i> Add Comment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="blog_id" class="form-control" value="{{ $blog->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="comment"><i class="fas fa-user"></i> Comment</label>
                                    <input type="text" name="comment" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="description"><i class="fas fa-envelope"></i> Description</label>
                                    <input type="description" name="description" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Student Modal (for each student) -->
            
            <div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog"
                aria-labelledby="editStudentModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action=" ">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStudentModalLabel "><i class="fas fa-edit"></i> Edit Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" value=" ">
                                <div class="form-group">
                                    <label for="comment"><i class="fas fa-user"></i> comment</label>
                                    <input type="text" name="comment" value=" " class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="description"><i class="fas fa-envelope"></i> description</label>
                                    <input type="description" name="description" value=" " class="form-control" required>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    


    </x-frontend.porto.layout.master>