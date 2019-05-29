@extends('layout.layout')
@section('title', 'Account')
@section('content')
    <a href="{{url('admin')}}">Go back</a>
    <h1>Account settings</h1>
    @if(count($errors) > 0)
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{url('admin/account')}}">
        @method('post')
        @csrf
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" placeholder="" value="{{$data['username']}}">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="" value="{{$data['password']}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

