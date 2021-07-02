@extends('master')
@section('content')
    <div class="container">
       <x-Alert/>

        <h1>Create posts</h1>
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="post_image">Feature Image</label>
                <br>
                <input class="form-control" type="file" name="post_image" />
                <br>
            </div>
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <br>
                <input class="form-control" type="text" name="title" />
                <br>
            </div>

            <div class="form-group mb-3">
                <label for="body">Body</label>
                <br>
                <textarea id="article-ckeditor" class=" form-control" name="body" id="" cols="30" rows="10"></textarea>
                <br>
            </div>
            <div class="form-group mb-3">
            <button type="submit" class="btn btn-success"> Submit </button>
            </div>
            

        </form>

    </div>

@endsection
