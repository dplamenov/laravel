<html lang="en">
<head>
    <title>@yield('title')</title>
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

