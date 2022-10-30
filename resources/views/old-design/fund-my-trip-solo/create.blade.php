@extends('layout')


@section('head')

@endsection
@section('content')
    <div class="container pt-3">
        <form method="post" action="{{route('solos-create')}}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="destination">Destination</label>
                    <input name="destination" type="text" class="form-control" id="destination" placeholder="Enter City">
                </div>
                <div class="form-group col-md-4">
                    <label for="trip-title">Trip Title</label>
                    <input name="title" type="text" class="form-control" placeholder="Awesome Trip !">
                </div>

                <div class="form-group col-md-4">
                    <label for="cost">Trip Cost</label>
                    <input name="cost" type="text" class="form-control"  placeholder="Awesome Trip !">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputAddress">Check-in Date</label>
                    <input name="startdate" type="date" class="form-control" id="inputAddress" value="2021-10-10">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress2">Check-out Date </label>
                    <input name="enddate" type="date" class="form-control" id="inputAddress2"
                           value="2021-10-10"/>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress2">Fund Duration (In Days) </label>
                    <input name="fund_duration" type="text" class="form-control"
                           value="30"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="trip-description">Trip Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Describe the trip with few words..."></textarea>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>
@endsection
@section("scripts")


@endsection
