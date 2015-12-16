@extends('layouts.master')

@section('title')
    My Cars
@stop

@section('content')

    <h1>My Cars</h1>

    @if(sizeof($cars) == 0)
        You don't have any cars of interest yet, <a href='/cars/create'>have fun adding one?</a>
    @else
        @foreach($cars as $car)
            <div>
                <h2>{{ $car->model }}</h2>
                <a href='/cars/edit/{{$car->id}}'>Edit </a>
                &nbsp;&nbsp;
                <a href='/cars/delete/{{$car->id}}'>Delete</a><br>
                <a href='{{ $car->purchase_link }}' target="_blank" class="banner-part">
                    <img src='{{ $car->picture }}'>
                </a>
            </div>
        @endforeach
    @endif

@stop
