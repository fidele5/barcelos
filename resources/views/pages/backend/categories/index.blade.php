@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">Categories</h4>
                                    <div class="ml-auto">
                                        <a href="{{ route("categorie.create") }}" class="btn btn-outline-primary">Create</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Designation</th>
                                                <th>Description</th>
                                                <th>Thumbnails</th>
                                                <th>Code</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $categorie)
                                                <tr>
                                                    <td>{{ $categorie->designation }}</td>
                                                    <td>{{ $categorie->description }}</td>
                                                    <td>{{ $categorie->thumbnails }}</td>
                                                    <td>{{ $categorie->code }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Button group">
                                                            <a href="{{ route("categorie.edit", $categorie) }}" class="btn btn-outline-info">Edit</a>
                                                            <a href="{{ route("categorie.destroy", $categorie) }}" class="btn btn-outline-info delete">Delete</a>
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
