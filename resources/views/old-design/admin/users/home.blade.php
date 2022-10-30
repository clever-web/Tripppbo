@extends('admin.layout')
@section('admin-content')
    <div>

                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <button type="button" class="btn btn-dark">Send an email</button>
                            <button type="button" class="btn btn-secondary">Block Membership</button>
                            <button type="button" class="btn btn-danger">Make Admin</button>

                        </td>

                    </tr>
                    @endforeach

                    </tbody>
                </table>
        {!! $users->links() !!}
    </div>
@endsection
