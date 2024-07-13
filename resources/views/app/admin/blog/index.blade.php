<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        .pagination {
            margin-top: 20px;
            justify-content: center; /* Center align pagination links */
        }

        .page-link {
            color: #007bff;
            border: 1px solid #dee2e6;
            margin: 0 4px; /* Adjust spacing between pagination items */
        }

        .page-link:hover {
            color: #0056b3;
            text-decoration: none;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Blog List</h1>

        <table id="blogTable" class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Summary</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td>
                        @if($blog->image)
                            <img src="{{ \Storage::disk('public')->url($blog->image) }}" alt="{{ $blog->title }}"
                                style="max-width: 100px;" class="img-fluid">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->content }}</td>
                    <td>{{ $blog->summary }}</td>
                    <td>{{ $blog->slug }}</td>
                    <td class="table-actions">
                        <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                            class="btn btn-link btn-action p-0">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link btn-action p-0"
                                onclick="return confirm('Are you sure you want to delete this blog?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {!! $blogs->links('app.admin.blog.pagination.index') !!}

        <div class="mb-3">
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Create Blog</a>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
   <script>
    $(document).ready(function () {
        $('#blogTable').DataTable({
            "searching": true,
            "language": {
                "search": '<i class="fas fa-search"></i>', 
                "emptyTable": "No data available in table", 
                "zeroRecords": "No matching records found" 
            }
        });
    });
</script>
<style type="text/css">
    .paginate_button.page-item.previous.disabled{
        display: none;
    }
    #blogTable_paginate, #blogTable_info{
        display: none;
    }
</style>


</body>

</html>
