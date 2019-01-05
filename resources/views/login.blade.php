@extends('header')
@section('title', 'Login form')
@section('content')
<h1>Login form</h1>

<form method="POST" action="{{url('admin/login')}}">
    @csrf
    @method('POST')

    <label>Username<input name="username" type="text"/></label>
    <label>Password<input name="password" type="password"/></label>

    <input type="submit"/>
</form>
    @endsection