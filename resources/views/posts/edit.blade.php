@extends('master')
@section('content')
    <div class="container">
        <x-Alert/>

        <h1>Update posts</h1>
        <form action="{{route('posts.update', $post->id)}}" method="Post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <br>
                <input class="form-control" type="text" name="title" placeholder="{{$post->title}}"/>
                <br>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <br>
                <textarea placeholder="{{$post->body}}" id="article-ckeditor" class=" form-control" name="body" id="" cols="30" rows="10"></textarea>
                <br>
            </div>
            <button type="submit" class=" mt-3 btn btn-success btn-sm"> Update </button>

        </form>

    </div>

@endsection
