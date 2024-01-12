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

        <div class="container">
            <div class="d-flex justify-content-between py-3">
                <div class="h5">Edit Employee</div>
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
            </div>

            <form action="{{ route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="card border-0 shadow-lg ">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name',$employee->name) }}">
                        @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$employee->email) }}">
                        @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                       <textarea name="address" id="address" cols="30" rows="4" placeholder="Enter Your Address" class="form-control" value="">{{ old('address',$employee->address) }}</textarea>
                    </div>
                   
                    <div class="mb-3">
                        <label for="image" class="form-label"></label>
                        <input type="file" name="image" class="@error('image') is-invalid @enderror">

                        @error('image')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror

                       <div class="pt-3">
                        @if($employee->image != '' && file_exists(public_path().'/uploads/employees/'.$employee->image))
                        <img src="{{ url('/uploads/employees/'.$employee->image) }}" width="100" height="100">
                        @endif
                       </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary my-3">Update Employee</button>
        </form>
        </div>
    
</body>
</html>