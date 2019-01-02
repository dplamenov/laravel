<h1>Login form</h1>

<form method="POST" action="{{url('admin/login')}}">
    @csrf
    @method('POST')
    <input type="submit"/>
</form>