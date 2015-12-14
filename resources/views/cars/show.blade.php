@extends('layouts.master')

@section('title')
    Show car
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    <link href="/css/cars/show.css" type='text/css' rel='stylesheet'>
@stop

@section('content')

    @if(!isset($model))
        You have not specified a car
    @else
        <h1>Show car: {{ $model }}</h1>
    @endif

@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    <script src="/js/cars/show.js"></script>
@stop
