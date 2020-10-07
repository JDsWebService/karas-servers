@extends('layouts.admin')

@section('title', 'User Management')

@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-3">
            <h3>Search For User</h3>
            {{ Form::open(['route' => 'admin.users.search', 'method' => 'POST']) }}
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Username#1234 OR Email">
                <button type="submit" class="btn btn-block btn-sm btn-success mt-3">
                    <i class="fas fa-search"></i> Search For User
                </button>
            {{ Form::close() }}
        </div>

        <div class="col-sm-9">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Provider ID</th>
                        <th scope="col">Full Username</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->provider_id }}</th>
                            <td>{{ $user->fullusername }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.users.info', $user->provider_id) }}" class="btn btn-info btn-block btn-sm">
                                    <i class="far fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $users->links() }}
        </div>
    </div>

@endsection
