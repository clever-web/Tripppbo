@extends('admin.layout')

@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="container d-flex justify-content-center align-items-center">
            <main class="text-center d-flex flex-column align-items-center justify-content-center px-4 m-3" style="max-width: 800px;background-color:#42464a;">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tickets Lottery</h1>

                </div>


                <h2>Create a lottery</h2>

                <form method="post" enctype="multipart/form-data" action="{{ route('admin-ticket-lottery-create') }}" class="w-100 needs-validation p-5" novalidate>
                    @csrf
                    <div>
                        <h1 style="font-size:16px;">Type Of Lottery</h1>
                            <input type="radio" id="virtual" name="type_of_lottery" value="virtual">
                            <label for="virtual">Virtual (Gift Card)</label><br>
                            <input type="radio" id="ticket" name="type_of_lottery" value="physical" checked>
                            <label for="ticket">Physical (Tickets)</label><br>
                        </div>
                    <div class="form-row d-flex align-items-center justify-center ">
                     
                    
                        <div class="col-md-3">

                            <img id="profile_img" style="width: 100%;max-height: 250px;object-fit: cover;border-radius: 10px;" src="/images-n/person-placeholder.jpg" />

                        </div>
                        <div class="col-md-9">
                            <div class="custom-file">
                                <input name="picture" type="file" onchange="readURL(this);" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01">Lottery Destination City</label>
                            <input name="city" type="text" class="form-control" id="validationCustom01" placeholder="City" required>

                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom02">Lottery Title</label>
                            <input name="title" type="text" class="form-control" id="validationCustom02" placeholder="Title..." required>

                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustomUsername">Entry fee</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">$</span>
                                </div>
                                <input name="entry_fee" type="text" class="form-control" id="validationCustomUsername" placeholder="10" aria-describedby="inputGroupPrepend" required>

                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="prize">Gift Card Value</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >$</span>
                                </div>
                                <input name="gift_card_value" type="text" class="form-control" id="prize" placeholder="200" aria-describedby="inputGroupPrepend" >

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom03">Description</label>
                            <textarea name="description" class="form-control" id="validationCustom03" rows="5" placeholder="Description" required></textarea>

                        </div>

                    </div>
                    <!--    <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div> -->
                    <button class="btn btn-secondary" type="submit">Create Ticket Lottery</button>
                </form>


            </main>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Number Of Entries</th>

                                <th scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lotteries as $lottery)
                            <tr>
                                <th scope="row">{{ $lottery->id }}</th>
                                <td>{{ $lottery->city }}</td>
                                <td>{{ $lottery->created_at }}</td>
                                <td>{{ $lottery->lotteryentries->count() }}</td>


                                @if ($lottery->winner_user_id == null)
                                <td>
                                    <form method="post" style="display:inline" action="{{ route('admin-tickets-lottery-pick-winner-post') }}">
                                        @csrf
                                        <input type="hidden" name="lottery_id" value="{{ $lottery->id }}" />
                                        <input type="hidden" name="entry_id" value="-1" />
                                        <div class="d-flex flex-row  w-100">
                                            <div class="w-50 p-3">
                                                <input type="submit" class="btn btn-success w-100" value="pick a winner automatically" />
                                            </div>
                                            <div class="w-50 p-3">
                                                <a href="{{ route('admin-tickets-lottery-pick-winner', $lottery->id) }}" class="btn btn-secondary w-100">Pick a winner manually</a>
                                            </div>
                                        </div>

                                    </form>





                                </td>
                                @else
                                <td>
                                    <span style="background-color: darkolivegreen; color: white;padding: 5px;border-radius: 5px;">Awarded
                                        to {{ $lottery->winner->name }} <br> #{{ $lottery->winner->id }}</span>

                                </td>

                                @endif
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('admin-scripts')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profile_img')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection