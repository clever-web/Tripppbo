@extends('master')


@section('content')
    <div id="terms">
        <div class="container mt-5">
            <div v-html="rules.Response.FareRules[0].FareRuleDetail"></div>
        </div>
    </div>
@endsection

@section('scripts-links')
    <script>
        const v = new Vue({
            el: "#terms",
            data: {
                flight: @json($data),
                rules: '',
            },
            mounted: function() {
                this.rules = JSON.parse(this.flight.FareRuleText);
            }
        })
    </script>
@endsection
