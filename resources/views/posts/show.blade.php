@extends('master')
@section('content')
    <div class="container mt-5">
            <a class="text-light btn " href="{{route('posts.page')}}">Go back</a>
       <div class="card">
           <div class="card-body">
               <h1 class="card-title">
                   {{$post->title}}
               </h1>
               <h3 class="card-text">
                   {{$post->body}}
               </h3>
               <hr>
               <small class=" mt-5"> {{$post->created_at}}</small> <br>
               <small> {{$post->id}}</small> <br>
               @if((session()->has('user_id')))
                       @if($post->user_id == session()->get('user_id'))

                           <a class=" mt-3 btn btn-primary btn-sm" href="{{route('posts.edit',$post->id)}}">Edit </a>
                           <a class=" mt-3 btn btn-primary btn-sm" href="#" onclick="event.preventDefault();
                               document.getElementById('post-id-{{$post->id}}').submit() ">Delete </a>
                   @endif
               @endif


           </div>
           </div>
    </div>

    <form method="POST" action="{{route('posts.delete',$post->id)}}" id="post-id-{{$post->id}}">
        @csrf
        @method('PUT')
    </form>
@endsection
