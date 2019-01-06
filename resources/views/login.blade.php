@extends('layout.layout')
@section('title', 'Login form')
@section('content')
    <h1>Login form</h1>

    @if(count($errors) > 0)
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{url('admin/login')}}">
        @csrf
        @method('POST')

        <label>Username<input name="username" type="text" value="{{old('username')}}"/></label>
        <label>Password<input name="password" type="password"/></label>

        <input type="submit"/>
    </form>
@endsection