@extends('layout.layout')
@section('title', 'Account')
@section('content')
    <a href="{{url('admin')}}">Go back</a>
    <h1>Account settings</h1>
    <form>
        <input type="text" name="username"/>
        <input type="password" name="password">
    </form>
@endsection

