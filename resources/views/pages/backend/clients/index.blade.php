@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">clients</h4>
                                    <div class="ml-auto">
                                        <a href="{{ route("client.create") }}" class="btn btn-outline-primary">Create</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Adresse</th>
                                                <th>Phone</th>
                                                <th>User</th>
                                                <th>Adresse</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $client)
                                                <tr>
                                                    <td>{{ $client->nom }}</td>
                                                    <td>{{ $client->prenom }}</td>
                                                    <td>{{ $client->adresse }}</td>
                                                    <td>{{ $client->phone }}</td>
                                                    <td>{{ $client->user->name }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Button group">
                                                            <a href="{{ route("client.edit", $client) }}" class="btn btn-outline-info">Edit</a>
                                                            <a href="{{ route("client.destroy", $client) }}" class="btn btn-outline-info delete">Delete</a>
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
