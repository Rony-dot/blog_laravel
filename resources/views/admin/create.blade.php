@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <x-alert/>
            <div class="card">
                <div class="card-header">
                <h4>Add New User!</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.create.user')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                        <label for="role_id">Select Role</label>
                            <select name="role_id" class="custom-select">
                            @foreach(\App\Models\Role::all() as $role)
                                <option value="{{$role->id}}"> {{$role->name}} </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="profile_image">Profile Image</label>
                            <input type="file" name="profile_image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection