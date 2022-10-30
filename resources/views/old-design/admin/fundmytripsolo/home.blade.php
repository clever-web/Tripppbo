@extends("admin.layout")
@section('admin-content')
<div >
    <div class="container-fluid">
        <div>
            <h3>Fund My Trip Solo</h3>
        </div>

        <div class="row">

            <div class="col-lg-6">

                <canvas id="raised_last_6_months"></canvas>
            </div>
            <div class="col-lg-3">
                <canvas id="raised_last_6_months2"></canvas>
            </div>
        </div>

        <div class="row" id="app">
            <div class="col-12">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Goal In USD</th>
                            <th scope="col">Amount Raised</th>
                            <th scope="col"># of donations</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($trips as $trip)
                            <tr>
                                <th scope="row"><a href="{{ route('solo-browse', $trip->id) }}">{{ $trip->id }}</a>
                                </th>
                                <td><a href="{{ route('profile-home', $trip->user->id) }}">{{ $trip->user->name }}</a>
                                </td>
                                <td>${{ $trip->goal }}</td>
                                <td>${{ $trip->totalAmountRaised() }}</td>
                                <td>{{ $trip->totalAmountOfDonations() }}</td>

                                <td>
                                    <div class="d-flex flex-row  w-100 ">
                                        <div class="w-50 p-3 {{ $trip->trashed() ? 'invisible' : '' }}">
                                            <input type="button" data-action="hide" data-trip-id="{{ $trip->id }}"
                                                class="btn btn-secondary w-100" value="Hide Trip" />
                                        </div>
                                        <div class="w-50 p-3 {{ $trip->trashed() ? '' : 'invisible' }}">
                                            <input type="button" data-action="hide" data-trip-id="{{ $trip->id }}"
                                                class="btn btn-secondary w-100" value="Restore Trip" />
                                        </div>
                                        <div class="w-50 p-3">
                                            <input type="button" data-action="redeem" data-trip-id="{{ $trip->id }}"
                                                class="btn btn-success w-100" value="Reedem trip amount as a gift card" />
                                        </div>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
              
                    <div class="my-pagination">
                        <nav aria-label="Page navigation example">

                            {!! $trips->links() !!}
                           
                        </nav>
                    </div>
               
            </div>
        </div>
    </div>

</div>
@endsection

@section('admin-scripts')

    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Raised in the last 6 months',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                color: 'rgb(255, 255, 255)',
                data: [0, 10, 5, 2, 20, 30, 100],

            }]
        };



        const options = {
            plugins: {
                title: {
                    display: true,
                    text: 'Amount raised in the last 6 months',
                    color: 'rgb(255, 255, 255)',

                },
                legend: {
                    labels: {
                        color: 'rgb(255,255,255)'
                    }
                },

            },
            scales: {
                x: {
                    /* title: {
                        color: 'rgb(255,255,255)'
                    }, */
                    grid: {
                        /* color: 'rgb(255,255,255)' */
                    }
                },
                y: {
                    /*    title: {
                           display: true,
                           text: 'Amount In USD',
                           color: 'rgb(255,255,255)'
                       }, */
                }
            }

        }

        const config = {
            type: 'line',
            data,
            options
        };
        var myChart = new Chart(
            document.getElementById('raised_last_6_months'),
            config
        );

  



        const data2 = {
            labels: [
                'Registered Users',
                'Guests',
              
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [33, 67],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                   
                ],
                hoverOffset: 4
            }]
        };

        const config2 = {
            type: 'doughnut',
            data: data2,
        };

        var myChart2 = new Chart(
            document.getElementById('raised_last_6_months2'),
            config2
        );
    </script>

<script>
 /*    Vue.use(BootstrapVue);


    CancelToken = axios.CancelToken;
    const source = CancelToken.source();

    var cancel = function() {

    } */

    var app = new Vue({
        el: '#app',

        data: {

         

        },

        mounted() {
        
        },

        methods: {

        }
    })
</script>
@endsection
