@extends('layout.layout')
@section('title', "{$title}")
@section('content')

    <form method="post" action="{{url('admin/page/еdit/'.$page['page_id'])}}">
        @csrf
        @method('post')
        <input type="hidden" name="page_id" style="display: none" value="{{$page['page_id']}}">
        <div>
            <label>Page title: <br><input type="text" name="page_title" style="width: 220px" value="{{$page['page_title']}}"/></label>
        </div>

        <div>
            <label>Page body: <br><textarea style="width: 220px" name="page_body">{{$page['page_body']}}</textarea></label>
        </div>

        <input type="submit"/>
    </form>


@endsection