@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">users</h4>
                                    <div class="ml-auto">
                                        <a href="{{ route("user.create") }}" class="btn btn-outline-primary">Create</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>email</th>
                                                <th>Avatar</th>
                                                <th>Location</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->avatar }}</td>
                                                    <td>{{ $user->location->designation }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Button group">
                                                            <a href="{{ route("user.edit", $user) }}" class="btn btn-outline-info">Edit</a>
                                                            <a href="{{ route("user.destroy", $user) }}" class="btn btn-outline-info delete">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
