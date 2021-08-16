@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">Locations</h4>
                                    <div class="ml-auto">
                                        <a href="{{ route("location.create") }}" class="btn btn-outline-primary">Create</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Designation</th>
                                                <th>Adresse</th>
                                                <th>Description</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($locations as $location)
                                                <tr>
                                                    <td>{{ $location->designation }}</td>
                                                    <td>{{ $location->adresse }}</td>
                                                    <td>{{ $location->description }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Button group">
                                                            <a href="{{ route("location.edit", $location) }}" class="btn btn-outline-info">Edit</a>
                                                            <a href="{{ route("location.destroy", $location) }}" class="btn btn-outline-info delete">Delete</a>
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
