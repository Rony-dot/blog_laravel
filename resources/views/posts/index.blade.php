@extends('master')
@section('content')
    <div class="container">
        <h1 class="text-center">posts page</h1>
        <x-alert/>
    @if(count($posts)>0)
        @foreach($posts as $post)

                <div class="card mb-3 border-danger">
                <img class="card-img-top" src="{{asset('uploads/posts/'.$post->post_image)}}" width="300px" height="300px" alt="Feature Image">
                    <div class="card-body">
                        <h3 class="card-title">
                            <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                        </h3>
                        <p class="card-text">
                            {{$post -> created_at}}
                        </p>
                    </div>
                </div>

                @endforeach
            {{$posts->links()}}
                @else
                    <p>No posts to show here... Please add one..!</p>
                @endif

            </div>

@endsection
