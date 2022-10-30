@extends('layout')


@section('head')

@endsection
@section('content')
    <div class="container pt-3">
        <form method="post" action="{{route('trip-request-to-join-post')}}">
            @csrf
            <input type="hidden" name="trip_id" value="{{$id}}" />
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="destination">Origin Country</label>
                    <input name="country" type="text" class="form-control" id="destination" placeholder="Country/City">
                </div>
                <div class="form-group col-md-6">
                    <label for="cost">Cost of the trip</label>
                    <input name="cost" type="text" class="form-control" placeholder="Cost of the trip">
                </div>
            </div>
         <!--   <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Start Date</label>
                    <input name="startdate" type="date" class="form-control" id="inputAddress" value="2021-10-10">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress2">End Date </label>
                    <input name="enddate" type="date" class="form-control" id="inputAddress2"
                           value="2021-10-10"/>
                </div>
            </div>-->
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="trip-description">Message</label>
                    <textarea name="message" class="form-control" rows="3" placeholder="Enter your message to the trip host here..."></textarea>
                </div>

            </div>
            <div class="form-row">

                <div class="form-group col-md-12">
                    <div class="custom-control custom-checkbox">
                        <input name="fund_flight" checked type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">I want the Trip creator to fund my Flight expenses.</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input name="fund_hotel" checked type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">I want the Trip creator to fund my Hotel expenses.</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send Request</button>
        </form>
    </div>
@endsection
@section("scripts")


@endsection
