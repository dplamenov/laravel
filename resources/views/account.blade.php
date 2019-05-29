@extends('layout.layout')
@section('title', 'Account')
@section('content')
    <a href="{{url('admin')}}">Go back</a>
    <h1>Account settings</h1>
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="email" class="form-control" id="username" placeholder="" value="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="email" class="form-control" id="password" placeholder="" value="">
        </div>
    </form>
@endsection

