@extends('admin.layout')

@section('admin-content')
  <div class="container">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <table class="table table-dark">
                      <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">User name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Created at</th>
                          <th scope="col">Total lotteries entered</th>
                          <th scope="col">Actions</th>

                      </tr>
                      </thead>
                      <tbody>

                      @foreach($entries as $entry)
                          <tr>
                              <th scope="row">{{$entry->id}}</th>
                              <td>{{$entry->user->name}}</td>
                              <td>{{$entry->user->email}}</td>
                              <td>{{$entry->created_at}}</td>
                              <td>{{$entry->user->CompletedLotteryEntries()->count()}}</td>

                              <td>
                                  <form method="post" action="{{route('admin-tickets-lottery-pick-winner-post')}}">
                                      @csrf
                                      <input type="hidden" name="lottery_id" value="{{$lottery->id}}" />
                                      <input type="hidden" name="entry_id" value="{{$entry->id}}" />
                                      <input type="submit" class="btn btn-success" value="AWARD LOTTERY">
                                  </form>



                              </td>

                          </tr>
                      @endforeach

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
@endsection
@section('admin-scripts')

@endsection
