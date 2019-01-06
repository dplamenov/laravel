@extends('layout.layout')
@section('title', 'Pages')
@section('content')
    <a href="{{url('admin')}}">Go back</a>
    <hr>
    <a href="{{url('admin/page/create')}}">Create page</a>
    @if(is_array($pages))
        <table border="1">
            <tr>
                <th>Page id</th>
                <th>Page title</th>
                <th>Page body</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($pages as $page)
                <tr>
                    <td>{{$page->page_id}}</td>
                    <td>{{$page->page_title}}</td>
                    <td>{{$page->page_body}}</td>
                    <td><a href="{{url('admin/page/еdit/'.$page->page_id)}}">Edit</a></td>
                    <td><a href="{{url('admin/page/delete/'.$page->page_id)}}">Delete</a></td>
                </tr>
            @endforeach
        </table>
    @else
        <p>{{$pages}}</p>

    @endif

    <hr>
    <h2>Set default page</h2>
    <div>
        <form method="post" action="{{url('admin/page/default')}}">
            @csrf
            @method('post')
            <label>
                Choose page

                <select name="page_id">
                    @foreach($pages as $page)
                        <option value="{{$page->page_id}}">{{$page->page_title}}</option>
                    @endforeach
                </select>
            </label>

            <input type="submit"/>
        </form>
    </div>

@endsection

