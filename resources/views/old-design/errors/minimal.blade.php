<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css-n/bootstrap.min.css')}}">
    <title>@yield('title')</title>
</head>
<body>

<div class="d-flex flex-column justify-content-center align-items-center " style="height: 100vh">
    <div><img src="{{asset('images-n/404.svg')}}"> </div>
    <div class="my-2" style="font-size: 32px;">  @yield('code') - @yield('message')</div>
    <div class="my-2">You will be redirected to the homepage shortly...</div>
</div>

<script src="{{asset('js-n/jquery.min.js')}}"></script>
<script src="{{asset('js-n/bootstrap.min.js')}}"></script>


<script>
    setTimeout(function () {
        window.location.href = "{{url('/')}}";
    },3000)
</script>
</body>
</html>
