@extends('layout.layout')
@section('title', 'Account')
@section('content')
    <a href="{{url('admin')}}">Go back</a>
    <h1>Account settings</h1>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="username" placeholder="" value="{{$data['username']}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" id="password" placeholder="" value="{{$data['password']}}">
        </div>
    </form>
@endsection

