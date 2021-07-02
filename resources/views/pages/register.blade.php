@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <x-alert/>
            <div class="card">
                <div class="card-header">
                <h4>Register Here!</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('register.user')}}" method="POST" enctype="multipart/form-data">
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
                            <label for="profile_image">Profile Image</label>
                            <input type="file" name="profile_image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection