@extends('master')
@section('content')
    <div class="container">
       <x-Alert/>

        <h1>Create posts</h1>
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <br>
                <input class="form-control" type="text" name="title" />
                <br>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <br>
                <textarea id="article-ckeditor" class=" form-control" name="body" id="" cols="30" rows="10"></textarea>
                <br>
            </div>
            <button type="submit" class="btn btn-success"> Submit </button>

        </form>

    </div>

@endsection
