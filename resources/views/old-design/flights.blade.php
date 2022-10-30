<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="{{asset('css/switch-box.css')}}" rel="stylesheet"/>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Open Sans', sans-serif;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }

        /*the container must be positioned relative:*/
        .autocomplete {
            position: relative;
            display: inline-block;
        }

        input {
            border: 1px solid transparent;
            background-color: #f1f1f1;
            padding: 10px;
            font-size: 16px;
        }

        input[type=text] {
            background-color: #f1f1f1;
            width: 100%;
        }

        input[type=submit] {
            background-color: DodgerBlue;
            color: #fff;
            cursor: pointer;
        }

        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
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

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(0,0,0,0)">
        <a class="navbar-brand" href="#">Trippbo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Fund My Trip</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Fund My Trip <span style="color: #00cbff;">Solo</span></a>
                </li>
                <!--    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li> -->
            </ul>

        </div>
    </nav>

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
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="p-lg-5" style="background-color: #dbeeff;padding:20px;border-radius: 10px;">


                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="p-lg-5" style="background-color: #dbeeff;padding:20px;border-radius: 10px;">

                        <div class="text-left" style="width: 100%;">
                            <div class="text-center" style="width: 100%;">
                                <p class="text-center"
                                   style="background-color: #00cbff;color:white;padding:5px;border-radius: 5px;font-size:1.7rem;width: fit-content;">
                                    Fund My Trip
                                </p>
                            </div>
                            <form>
                                <p style="font-size:1rem">
                                <span
                                    style="background-color: #00cbff; border-radius: 50%;padding:5px 10px;color:white;">1</span>
                                    <span
                                        style="background-color: white;padding:7px;border-radius: 2px;line-height: 250%;">Select a destination the you would like to visit, along with a check-in and check-out date.</span>
                                </p>


                                <div class="d-flex flex-row justify-content-center align-items-center m-3"
                                     style="border-bottom: solid white 3px">
                                    <div class="text-center" style="width: fit-content;">


                                        <div
                                            class="d-flex text-center flex-row justify-content-around align-items-center"
                                        >
                                            <i class="fas fa-globe-europe fa-2x"></i>
                                            <div class="d-flex flex-row align-items-center justify-content-center">
                                                <div style="padding: 10px;font-size: 1.5rem;color:#474747">


                                                    I want to travel from
                                                    <div class="autocomplete" style="width:fit-content;">
                                                        <input style="background-color: white;" id="myInput" type="text"
                                                               name="myCountry"
                                                               placeholder="City, Country, Airport...">

                                                    </div>

                                                    To
                                                    <div class="autocomplete" style="width:fit-content;">
                                                        <input style="background-color: white;" id="myInput" type="text"
                                                               name="myCountry"
                                                               placeholder="City, Country, Airport...">

                                                    </div>
                                                </div>
                                                <div style="padding: 10px;">


                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex text-center flex-row justify-content-around align-items-center"
                                        >
                                            <i class="far fa-calendar-minus fa-2x"></i>
                                            <div class="d-flex flex-row align-items-around justify-content-around   ">
                                                <div style="padding: 10px;font-size: 1.5rem;color:#474747">


                                                    On

                                                    <input style="background-color: white;" type="date"
                                                    >


                                                    Until
                                                    <input style="background-color: white;" type="date"
                                                    >
                                                </div>
                                                <div style="padding: 10px;">


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div style="border-bottom: white solid 3px">
                                    <p style="font-size:1rem">
                                <span
                                    style="background-color: #00cbff; border-radius: 50%;padding:5px 10px;color:white;">2</span>
                                        <span
                                            style="background-color: white;padding:7px;border-radius: 2px;line-height: 250%;">I would like to travel </span>
                                    </p>


                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <div class="text-center" style="width: fit-content;">


                                            <div
                                                class="d-flex text-center flex-row justify-content-around align-items-center"
                                            >

                                                <div class="d-flex flex-row align-items-center justify-content-center">
                                                    <div style="padding: 10px;font-size: 1.5rem;color:#474747">


                                                    </div>
                                                    <div style="padding: 10px;" class="text-left">

                                                        <p style="margin-bottom: 25px">
                                                            <input type="radio" id="test1" name="radio-group" checked>
                                                            <label for="test1">

                                                            <span
                                                                style="background-color: #00cbff;color:white;padding:15px;border-radius: 3px;">    <i
                                                                    class="fas fa-male  "></i></span>

                                                                <span
                                                                    style="background-color: #00cbff;color:white;padding:15px;border-radius: 3px;">By Myself</span>

                                                            </label>
                                                        </p>
                                                        <p>
                                                            <input type="radio" id="test2" name="radio-group">
                                                            <label for="test2">

                                                            <span
                                                                style="background-color: #00cbff;color:white;padding:15px;border-radius: 3px;">  <i
                                                                    class="fas fa-male  "></i>  <i
                                                                    class="fas fa-male  "></i></span>

                                                                <span
                                                                    style="background-color: #00cbff;color:white;padding:15px;border-radius: 3px;">with a partner</span>

                                                            </label>
                                                        </p>


                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                                <div class="mt-3" style="border-bottom: white solid 3px">
                                    <p style="font-size:1rem">
                                <span
                                    style="background-color: #00cbff; border-radius: 50%;padding:5px 10px;color:white;">3</span>
                                        <span
                                            style="background-color: white;padding:7px;border-radius: 2px;line-height: 250%;">I want to book the following services:</span>
                                    </p>


                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <div class="text-center" style="width: fit-content;">


                                            <div
                                                class="d-flex text-center flex-row justify-content-around align-items-center"
                                            >

                                                <div class="d-flex flex-row align-items-center justify-content-center">

                                                    <div style="padding: 10px;"
                                                         class="text-center d-flex flex-column justify-content-start align-items-start">


                                                        <div class="form-check m-2">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="flexCheckDefault" checked>
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                <span
                                                                    style="padding:5px;background-color: #00cbff;color:white;border-radius: 5px;">Acommodation</span>
                                                            </label>
                                                        </div>


                                                        <div class="form-check m-2">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="flexCheckChecked" checked>
                                                            <label class="form-check-label" for="flexCheckChecked">
                                                                <span
                                                                    style="padding:5px;background-color: #00cbff;color:white;border-radius: 5px;">Flight</span>
                                                            </label>
                                                        </div>


                                                        <div class="form-check m-2">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="flexCheckChecked2">
                                                            <label class="form-check-label" for="flexCheckChecked2">
                                                                <span
                                                                    style="padding:5px;background-color: #00cbff;color:white;border-radius: 5px;">Car</span>
                                                            </label>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>





                                <div class="mt-3" style="border-bottom: white solid 3px">
                                    <p style="font-size:1rem">
                                <span
                                    style="background-color: #00cbff; border-radius: 50%;padding:5px 10px;color:white;">4</span>
                                        <span
                                            style="background-color: white;padding:7px;border-radius: 2px;line-height: 250%;">Let's get started... </span>
                                    </p>


                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <div class="text-center" style="width: fit-content;">


                                            <div
                                                class="d-flex text-center flex-row justify-content-around align-items-center"
                                            >

                                                <div class="d-flex flex-row align-items-center justify-content-center">

                                                    <input class="form-control p-lg-2" type="submit" value="Search" />
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat
                veniam.
                Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure
                adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat.
                Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit.
                Exercitation
                mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim
                ullamco ad duis occaecat ex.
            </div>
            <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat
                veniam.
                Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure
                adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat.
                Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit.
                Exercitation
                mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim
                ullamco ad duis occaecat ex.
            </div>
        </div>

    </div>
</div>


{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script> --}}
<script src="{{asset('js/autocomplete.js')}}"></script>
</body>
</html>
