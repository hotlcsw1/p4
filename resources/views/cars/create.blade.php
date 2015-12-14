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
            <label for='title'>* Picture (URL):</label>
            <input
            type='text'
            id='picture'
            name="picture"
            value='{{ old('picture','http://automobiles.honda.com/honda-app/images/tablet/2016/civic-sedan/exterior-colors/CB_115.jpg') }}'
            >
        </div>

        <div class='form-group'>
            <label>Price:</label>
            <input
            type='text'
            id='price'
            name='price'
            value='{{ old('price','10000') }}'
            >
        </div>

        <div class='form-group'>
            <label for='title'>URL To purchase this car:</label>
            <input
            type='text'
            id='purchase_link'
            name='purchase_link'
            value='{{ old('purchase_link','http://automobiles.honda.com/tools/build-price/colors.aspx?ModelName=Civic%20Sedan&ModelYear=2016&ModelID=FC2E5GEW&EColor=NH-578&IColor=IV') }}'
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
