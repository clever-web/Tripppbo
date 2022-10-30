@extends('master')
@section('content')
    <div id="vue_app_haha" style="height: 100vh;width: 100vw">
        <date-picker :range="isRange"></date-picker>
    </div>
@endsection


@section('scripts-links')
    <script>
        const chat_app = new Vue({
            el: "#vue_app_haha",

            data: {
                isRange: true,

            },
        });
    </script>
@endsection
