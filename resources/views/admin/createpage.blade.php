@extends('header')
@section('title', 'Create page')
@section('content')
<a href="{{url('admin/page')}}">Go back</a>
<hr>
@if(count($errors) > 0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{url('admin/page/create')}}">
    @csrf
    @method('post')
    <label>Title<br><input type="text" name="title" style="width: 200px"></label><br>
    <label>Body<br><textarea name="body" style="width: 200px"></textarea></label><br>
    <input type="submit"/>
</form>
@endsection
