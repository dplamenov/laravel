@extends('layout.layout')
@section('title', 'Admin panel')
@section('content')
    <span>Logged</span> <a href="{{url('logout')}}">Log out</a>
<br>
<div>
    <a href="{{url('admin/page')}}">Page</a>
    <a href="{{url('admin/account')}}">Account</a>
</div>
    @endsection


