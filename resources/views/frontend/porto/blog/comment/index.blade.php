<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            comment
        </x-slot>
        <x-slot name="body">

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">

                        <hr>
                        <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addStudentModal">
                        <i class="fas fa-user-plus"></i>    Add Comment
                        </button>

                        <table class="table table-bordered">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th><i class="fas fa-user"></i> Sri</th>
                                    <th><i class="fas fa-user"></i> Comment</th>
                                    <th><i class="fas fa-envelope"></i> description</th>

                                    <th><i class="fas fa-cog"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $comment->comment }}</td>
                                        <td>{{ $comment->description }}</td>
                                        <td>
                                            <!-- Edit button -->
                                            {{-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editCommentModal{{ $comment->id }}" data-comment="{{ $comment->comment }}" data-description="{{ $comment->description }}">
                                                <i class="fas fa-edit"></i>
                                            </button> --}}

                                            <!-- Delete button -->
                                            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" 
                                                onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this product?')){ this.closest('form').submit(); }"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="icon-trash-alt"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table> 



                    </div>
                </div>
            </div>

            <!-- Add Student Modal -->
            <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="addStudentModalLabel"><i class="fas fa-user-plus"></i> Add Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                {{-- <div class="form-group">
                                    <input type="hidden" name="blog_id" class="form-control" value="{{$blog->blog_id}}">
                                </div> --}}

                                <select name="blog_id" class="form-control custom-select">
                                    @foreach ($blogs as $blog )
                                    <option value="{{ $blog->id }}"name="blog_id">{{ $blog->title }}</option>
                                                         
                                    @endforeach
                                   </select>
                          

                                {{-- <div class="col-lg-6">
                                    <label for="">{{ __('Select blog') }}</label>
                                    <select name="blog_id" id="blog_id" class="form-control select-search">
                                        <option value="">-- Please select --</option>
                                        @foreach ($blogs as $blog)
                                            <option value="{{ $blog->id }}">{{ $blog->title }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}


                                <div class="form-group">
                                    <label for="comment"><i class="fas fa-user"></i> comment</label>
                                    <input type="text" name="comment" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="description"><i class="fas fa-envelope"></i> description</label>
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

        </x-slot>

    </x-data-display.card>
</x-layouts.master>
