@extends('layouts.master')

@section('title')
    Delete a Car
@stop


@section('content')

    <h1>Delete Car</h1>

    <p>
        Are you sure you want to delete <em>{{$car->model}}</em>?
    </p>

    <p>
        <a href='/cars/delete/{{$car->id}}'>Yes...</a>
    </p>

@stop
