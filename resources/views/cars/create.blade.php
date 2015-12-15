@extends('layouts.master')

@section('title')
Create a Car
@stop


{{--
    This `head` section will be yielded right before the closing </head> tag.
    Use it to add specific things that *this* View needs in the head,
    such as a page specific styesheets.
    --}}
    @section('head')
    {{-- <link href="/css/cars/create.css" type='text/css' rel='stylesheet'> --}}
    @stop



    @section('content')

    <h1>Add a new car</h1>

    @include('errors')

    <form method='POST' action='/cars/create'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <div class='form-group'>
            <label for='year'>* Year (YYYY):</label>
            <input
            type='text'
            id='year'
            name="year"
            value='{{ old('year','2016') }}'
            >
        </div>

        <div class='form-group'>
            <label for='manufacturer'>* Manufacturer:</label>
            <select name='manufacturer' id='manufacturer'>
                @foreach($manufacturers_for_dropdown as $manufacturer_id => $manufacturer_name)
                    <option value='{{ $manufacturer_id }}'> {{ $manufacturer_name }} </option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label>* Model:</label>
            <input
            type='text'
            id='model'
            name='model'
            value='{{ old('model','Civic') }}'
            >
        </div>

        <div class='form-group'>
            <label>* Style:</label>
            <input
            type='text'
            id='style'
            name='style'
            value='{{ old('style','LX') }}'
            >
        </div>

        <div class='form-group'>
            <label for='size'>* Size:</label>
            <select name='size' id='size'>
                @foreach($sizes_for_dropdown as $size_id => $size_name)
                    <option value='{{ $size_id }}'> {{ $size_name }} </option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label for='title'>* Picture (URL):</label>
            <input
            type='text'
            id='picture'
            name="picture"
            value='{{ old('picture','https://media.ed.edmunds-media.com/honda/civic/2016/oem/2016_honda_civic_sedan_touring_rq_oem_5_500.jpg') }}'
            >
        </div>

        <div class='form-group'>
            <label>Price:</label>
            <input
            type='text'
            id='price'
            name='price'
            value='{{ old('price','24735') }}'
            >
        </div>

        <div class='form-group'>
            <label for='title'>URL To purchase this car:</label>
            <input
            type='text'
            id='purchase_link'
            name='purchase_link'
            value='{{ old('purchase_link','http://automobiles.honda.com/civic-hybrid/') }}'
            >
        </div>

        <div class='form-group'>
            <label for='tags'>Tags</label>
            @foreach($tags_for_checkbox as $tag_id => $tag)
                <input type='checkbox' name='tags[]' value='{{$tag_id}}'> {{ $tag['name'] }}<br>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Add car</button>
    </form>

    @stop


    {{--
        This `body` section will be yielded right before the closing </body> tag.
        Use it to add specific things that *this* View needs at the end of the body,
        such as a page specific JavaScript files.
        --}}
        @section('body')
        {{-- <script src="/js/cars/create.js"></script> --}}
        @stop
