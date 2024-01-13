@extends('admin.master')
@section('content')
<div class="bg-dark py-3">
    <div class="container">
        <div class="h4 text-white">Laravel 9 Crud</div>
    </div>
</div>

    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h5">Employees</div>
            <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
        </div>

        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card border-0 shadow-lg ">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                   <textarea name="address" id="address" cols="30" rows="4" placeholder="Enter Your Address" class="form-control" value="">{{ old('address') }}</textarea>
                </div>
               
                <div class="mb-3">
                    <label for="image" class="form-label"></label>
                    <input type="file" name="image" class="@error('image') is-invalid @enderror">

                    @error('image')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-3">Save Employee</button>
    </form>
    </div>
    
@endsection