@extends('layout')


@section('head')

@endsection
@section('content')
    <div class="container py-4">
        <div class="container" style="border: 1px solid gray;">
            <div class="d-flex my-5 flex-column justify-content-center align-items-center">
                <div class="d-flex flex-row justify-content-center align-items-center">
                    <div>
                        <a href="{{route('trip-add-hotel', $trip->id)}}"  class="btn btn-info mr-3">Add Hotel</a>
                    </div>
                    <div>
                        <span style="color:green;"><i class="fas fa-check"></i> Hotel Has Been Added!</span>
                    </div>
                </div>
                <div class="d-flex mt-3 flex-row justify-content-center align-items-center">
                    <div>
                        <button type="button" class="btn btn-info mr-3">Add Flight</button>
                    </div>
                    <div>
                        <span style="color:green;"><i class="fas fa-check"></i> Flight Has Been Added!</span>
                    </div>
                </div>

                <div class="mt-3">
                    <span style="color: red;">
                    Reservation must be completed by the Trip Creator in 11 Hours.
                    </span>
                </div>
            </div>



            <div class="text-center d-flex mt-3 flex-column align-items-end justify-content-center mb-2" >
                <button type="button" class="btn btn-success mr-3">Submit information to the Trip Creator</button>
               
            
                You can't edit your selected Hotel Or Flight after you submit them to the Trip Creator.
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection
