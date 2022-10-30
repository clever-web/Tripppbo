<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <style>
        * {

            font-family: 'Open Sans', sans-serif;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }

    </style>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5c7d1f5b9d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
    <title>Document</title>
</head>
<body>


<div class="container-fluid m-0 p-0 main-homepage">

    @include('custom-components.navbar')

    <div style="width:100%;text-align: center;margin-top:100px;">
        <p style="color:white;font-size: 3rem">Don't listen to what they say</p>
        <p style="color: #00cbff;font-size: 3rem">GO SEE</p>
    </div>
    <div>
        <nav style="margin-bottom: 50px;">
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link tabs-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                   role="tab"
                   aria-controls="nav-home" aria-selected="true">Book a trip</a>
                <a class="nav-item nav-link tabs-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                   role="tab"
                   aria-controls="nav-profile" aria-selected="false">Fund My Trip</a>
                <a class="nav-item nav-link tabs-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                   role="tab"
                   aria-controls="nav-contact" aria-selected="false">Fund My Trip <span
                        style="color:white;background-color: #00cbff;padding:5px;border-radius: 5px;">Solo</span></a>
                <a class="nav-item nav-link tabs-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab"
                   aria-controls="nav-about" aria-selected="false">Tickets Lottery</a>
            </div>
        </nav>

    </div>

    @include("custom-components.modals")

</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src="{{asset('js/timezone.js')}}"></script>

<script>
    document.getElementById('startdate').value = new Date().toDateInputValue();
    date = new Date();
    date.setDate(date.getDate() + 7);
    document.getElementById('returndate').value = date.toDateInputValue();
</script>
</body>
</html>
