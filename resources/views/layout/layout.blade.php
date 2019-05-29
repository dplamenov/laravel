<html lang="en">
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}"/>
    <script src="{{url('js/ckeditor/ckeditor.js')}}"></script>
    @section('script')
        @show
</head>
<body>
<div class="container">
    @section('content')
    @show
</div>
</body>
</html>

