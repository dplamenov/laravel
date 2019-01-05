@extends('header')
@section('title', 'Error')
@section('content')
Error: {{$error}}
<p>Go to <a href="{{url('/')}}">Home</a></p>
@endsection
