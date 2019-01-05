<a href="{{url('admin')}}">Go back</a>
<hr>
<a href="{{url('admin/page/create')}}">Add page</a>
    @if(is_array($pages))
        <table border="1">
            <tr><th>Page id</th><th>Page title</th><th>Page body</th><th>Edit</th><th>Delete</th></tr>
        @foreach ($pages as $page)
            <tr>
                <td>{{$page->page_id}}</td>
                <td>{{$page->page_title}}</td>
                <td>{{$page->page_body}}</td>
                <td>Edit</td>
                <td><a href="{{url('admin/page/delete/'.$page->page_id)}}">Delete</a></td>
            </tr>
        @endforeach
        </table>
    @else
        <p>{{$pages}}</p>

    @endif