@extends('main')

@section('title', 'Categories')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="col-md-2">
                <a class="btn btn-success mr-3" data-toggle="modal" data-target="#createCategoryModal">
                    <i class="fas fa-plus"></i> Add Category
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class="btn-sm btn-primary mr-3" data-toggle="modal" data-target="#updateCategoryModal"
                                    data-category-name="{{ $category->name }}"
                                    data-category-slug="{{ $category->slug }}">
                                    <i class="  fas fa-edit"></i> Edit
                                </a>
                                <form action="/categories/{{ $category->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="bg-danger border-0 rounded-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    {{-- Create Modal --}}
    <div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <form method="POST" action="/categories">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createCategoryModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Category Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- Update Modal --}}
    <div class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="updateCategoryModalLabel" aria-hidden="true">
        <form method="POST" action="/categories" id="update-form">
            @method('PUT')
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateCategoryModalLabel">Update Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Category Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        @if (Session::has('status'))
            $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Success',
            body:"{{ session('status') }}"
            })
        @endif
        $('#updateCategoryModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var categoryName = button.data('category-name') // Extract info from data-* attributes
            var categorySlug = button.data('category-slug') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body input').val(categoryName)

            var form = document.getElementById("update-form");

            form.action = "/categories/" + categorySlug;
        })
    </script>
@endsection
