@extends('header')
@section('title', 'Create page')
@section('content')
<a href="{{url('admin/page')}}">Go back</a>
<hr>
<form method="post" action="{{url('admin/page/create')}}">
    @csrf
    @method('post')
    <label>Title<br><input type="text" name="title" style="width: 200px"></label><br>
    <label>Body<br><textarea name="body" style="width: 200px"></textarea></label><br>
    <input type="submit"/>
</form>
@endsection
