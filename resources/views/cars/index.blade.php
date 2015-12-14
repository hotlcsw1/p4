@extends('layouts.master')

@section('title')
    My Cars
@stop

@section('content')

    <h1>My Cars</h1>

    @if(sizeof($cars) == 0)
        You don't have any cars of interest yet, <a href='/cars/create'>Why not add one?</a>
    @else
        @foreach($cars as $car)
            <div>
                <h2>{{ $car->title }}</h2>
                <a href='/cars/edit/{{$car->id}}'>Edit</a><br>
                <img src='{{ $car->cover }}'>
            </div>
        @endforeach
    @endif

@stop
