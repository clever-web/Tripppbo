@extends('layout')


@section('head')

@endsection
@section('content')
    <div class="container pt-3">

        <form  method="post" action="{{route('trip-create')}}">
            @csrf


            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="destination">Destination</label>
                    <input name="destination" type="text" class="form-control" id="destination" placeholder="Enter City">
                </div>
                <div class="form-group col-md-6">
                    <label for="trip-title">Trip Title</label>
                    <input name="title" type="text" class="form-control" name="trip-title" placeholder="Awesome Trip !">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Check-in Date</label>
                    <input name="startdate" type="date" class="form-control" id="inputAddress" value="2021-10-10">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress2">Check-out Date </label>
                        <input name="enddate" type="date" class="form-control" id="inputAddress2"
                               value="2021-10-10"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="trip-description">Trip Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Describe the trip with few words..."></textarea>
                </div>

            </div>
            <div class="form-row">

                <div class="form-group col-md-12">
                    <div class="custom-control custom-checkbox">
                        <input name="should_book" checked type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">I want to book my trip through Trippbo (Select this if you haven't booked your trip through other providers yet)</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>

    </div>
@endsection
@section("scripts")


@endsection
