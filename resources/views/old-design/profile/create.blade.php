@extends('layout')
@section('head')
@endsection


@section('content')


    <div class="container">



        <form class="needs-validation text-center mt-4" novalidate enctype="multipart/form-data" method="post" action="{{route('profile-store' , 1)}}">
@csrf

            <div class="form-row m-3">
                <div class="col-md-8 mb-3">
                    <label for="validationTooltip01">Full name</label>
                    <input type="text" class="form-control" id="validationTooltip01" placeholder="Full name" value="" >
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="validationTooltipUsername">Phone number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                        </div>
                        <input name="phone_number" type="text" class="form-control" id="validationTooltipUsername" placeholder="phone number" aria-describedby="validationTooltipUsernamePrepend">
                        <div class="invalid-tooltip">

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row m-3">
                <div class=" offset-md-3 col-md-6  mb-3">
                    <label for="validationTooltip03">City</label>
                    <input name="country" type="text" class="form-control" id="validationTooltip03" placeholder="City" required>
                    <div class="invalid-tooltip">
                        Please provide a valid city.
                    </div>
                </div>

            </div>
            <div class="form-row d-flex align-items-center justify-center m-3 p-3" style="background-color: white;">
                <div class="col-md-3">
                    <div>
                        <img id="profile_img" style="width: 100%;object-fit: cover" src="https://www.hopkinsusfhp.org/wp-content/uploads/2018/02/person-placeholder.jpg" />
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="custom-file">
                        <input name="picture" type="file" onchange="readURL(this);" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>


            <button class="btn btn-primary" type="submit">Submit form</button>

        </form>
    </div>
@endsection




@section('scripts')

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile_img')
                        .attr('src', e.target.result)
                       ;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
