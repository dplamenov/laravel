@extends('layout.layout')
@section('title', "{$title}")

@section('content')

    @if(count($errors) > 0)
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    You edit page: {{$page['page_title']}}
    <form method="post" action="{{url('admin/page/еdit/'.$page['page_id'])}}">
        @csrf
        @method('post')
        <input type="hidden" name="page_id" style="display: none" value="{{intval($page['page_id'])}}">
        <div>
            <label>Page title: <br><input type="text" name="page_title" style="width: 220px"
                                          value="{{$page['page_title']}}"/></label>
        </div>

        <div style="align-self: center; width: 780px">
            <label>Page body: <br><textarea style="width: 220px"
                                            name="page_body" id="page_body">{{$page['page_body']}}</textarea></label>
        </div>

        <input type="submit"/>
    </form>
    <script>CKEDITOR.replace( 'page_body' );</script>

@endsection
