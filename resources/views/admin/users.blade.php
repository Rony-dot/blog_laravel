@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <x-alert/>
            <div class="card">
                <div class="card-header">
                <h1>All users data
                    <a href="{{route('admin.create')}}" class="btn btn-primary float-end ">Add User</a>
                </h1>
               
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roles()->first()->name }}</td>
                                <td><img src="{{asset('uploads/users/'.$user->profile_image)}}" width="70px" height="70px" alt="Profile Picture"></td>
                                <td><a class="mt-3 btn btn-primary " href="{{route('admin.edit.user',$user->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                                <td><a class=" mt-3 btn btn-warning " href="#" onclick="event.preventDefault();
                               document.getElementById('admin-Delete-User-{{$user->id}}').submit() ">Delete </a></td>
                            </tr>
                            <form method="Post" action="{{route('admin.delete.user',$user->id)}}" id="admin-Delete-User-{{$user->id}}" >
                                @csrf
                                @method("PUT")
                            </form>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection