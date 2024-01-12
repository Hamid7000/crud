<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">Laravel 9 Crud</div>
        </div>
    </div>

        <div class="container pt-3">
            <div class="d-flex justify-content-between">
                <div class="h5">Employees</div>
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Create</a>
            </div>

            @if(Session::has('success'))
            <div class="alert alert-succcess">
                {{ Session::get('success') }}
            </div>
            @endif

            <div class="card border-0 shadow-lg mt-4">
                <div class="card-body mt-2">
                    <table class="table table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>


                        @if($employees->isNotEmpty())
                        @foreach ($employees as $employee)
                        <tr valign="middle">
                            <td>{{ $employee->id }}</td>
                            <td>
                            @if($employee->image != '' && file_exists(public_path().'/uploads/employees/'.$employee->image))
                            <img src="{{ url('/uploads/employees/'.$employee->image) }}" class="rounded-circle" width="40" height="40">
                            @else
                            <img src="{{ url('/assets/admin/img/jcb.png'.$employee->image) }}" class="rounded-circle" width="40" height="40">
                            @endif

                            </td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                                <form id="employee-edit-action-{{ $employee->id }}" action="{{ route('employees.destroy',$employee->id) }}" method="post">
                                    <button type="submit" onclick="deleteEmployee({{ $employee->id }})" class="btn btn-danger">Delete</button>
                              @csrf
                              @method('Delete')
                                </form>
                            </td>
                        </tr>
                        @endforeach


                        @else
                        <tr>
                            <td colspan="6">Record Not Found</td>
                        </tr>

                        @endif
                    </table>
                </div>
            </div>

            <div class="mt-3">
                {{ $employees->links() }}
            </div>
        </div>
    
</body>
</html>

<script>
    function deleteEmployee(id) {
        if (confirm("Are You Sure You Want To Delete ?")) {
            document.getElementById('employee-edit-action'+id).submit();
        }
    }
</script>