@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <x-alert/>
            <div class="card">
                <div class="card-header">
                <h4>Edit User Profile Here!</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.update.user',$user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" name="email"  value="{{$user->email}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password"  value="" class="form-control">
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
                            <input type="file" name="profile_image"  class="form-control">
                            <img src="{{asset('uploads/users/'.$user->profile_image)}}" width="100px" height="100px" alt="">
                        </div>
                        <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection