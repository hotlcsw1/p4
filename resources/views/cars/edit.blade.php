@extends('layouts.master')

@section('title')
    Edit A Car
@stop


@section('content')

    <h1>Edit</h1>

    @include('errors')

    <form method='POST' action='/cars/edit'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $car->id }}'>

        <div class='form-group'>
            <label for='Year'>* Year (YYYY):</label>
            <input
                type='text'
                id='year'
                name="year"
                value='{{$car->year}}'
                >
        </div>

        <div class='form-group'>
            <label for='manufacturer'>* Manufacturer:</label>
            <select name='manufacturer' id='manufacturer'>
                @foreach($manufacturers_for_dropdown as $manufacturer_id => $manufacturer_name)

                    {{ $selected = ($manufacturer_id == $car->manufacturer->id) ? 'selected' : '' }}

                    <option value='{{ $manufacturer_id }}' {{ $selected }}> {{ $manufacturer_name }} </option>
                @endforeach
            </select>
        </div>

        <div class='form-group'>
            <label>* Model:</label>
            <input
                type='text'
                id='model'
                name='model'
                value='{{$car->model}}'
            >
        </div>

        <div class='form-group'>
            <label>* Style:</label>
            <input
                type='text'
                id='style'
                name='style'
                value='{{$car->style}}'
            >
        </div>

        <div class='form-group'>
            <label for='title'>* Picture (URL):</label>
            <input
                type='text'
                id='picture'
                name="picture"
                value='{{$car->picture}}'
                >
        </div>

        <div class='form-group'>
            <label for='Price'>Price:</label>
            <input
                type='text'
                id='price'
                name="price"
                value='{{$car->price}}'
                >
        </div>

        <div class='form-group'>
            <label for='title'>URL To purchase this car:</label>
            <input
                type='text'
                id='purchase_link'
                name='purchase_link'
                value='{{$car->purchase_link}}'
                >
        </div>

        <div class='form-group'>
            <label for='tags'>Tags</label>
            @foreach($tags_for_checkbox as $tag_id => $tag)
                <?php $checked = (in_array($tag['name'],$tags_for_this_car)) ? 'CHECKED' : '' ?>
                <input {{ $checked }} type='checkbox' name='tags[]' value='{{$tag_id}}'> {{ $tag['name'] }}<br>
            @endforeach
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

@stop
