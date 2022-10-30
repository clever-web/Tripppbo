@extends('admin.layout')
@section('admin-content')
    <div>

                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Reported By</th>
                        <th scope="col">Violating object</th>
                        <th scope="col">Violating id</th>
                        <th scope="col">report reason</th>
                        <th scope="col">report comment</th>
                        <th scope="col">Link to violating object</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($reports as $report)
                    <tr>
                        <th scope="row"><a href="{{route('profile-home' , $report->reported_by_user_id)}}">{{$report->user->name}}</a></th>
                        <td>{{$report->violating_object}}</td>
                        <td>{{$report->violating_object_id}}</td>
                        <td>{{$report->report_reason}}</td>
                        <td>{{$report->report_comment}}</td>
                        <td>

                            @if($report->violating_object == 'trip')
                            <a href="{{route('trip-browse' , $report->violating_object_id)}}">Click Here </a>
                            @endif

                        </td>

                    </tr>
                    @endforeach

                    </tbody>
                </table>
        {!! $reports->links() !!}
    </div>
@endsection
