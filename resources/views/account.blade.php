@extends('layout.layout')
@section('title', 'Account')
@section('content')
    <a href="{{url('admin')}}">Go back</a>
    <h1>Account settings</h1>
    <form>
        <label>Username<input type="text" name="username" style="margin-bottom: 2px;margin-left: 10px"/></label>
        <br>
        <label>Password<input type="password" name="password" style="margin-bottom: 2px;margin-left: 10px"></label>
    </form>
@endsection

