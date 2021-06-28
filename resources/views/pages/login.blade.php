@extends('master')
@section('content')
    <x-alert/>
    <div class="container">
        <form action="{{route('login.user')}}" method="post">
            @csrf
            <input type="text" name="email" value="{{old('email')}}"> <br>
            <input type="password" name="password"> <br>
            <button type="submit"> Login</button>
        </form>
    </div>
@endsection
