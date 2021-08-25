@extends('pages.guest.layout.template')

@section('content')
            <div class="container-fluid mt-4 mb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">Commandes en cours</h4>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Client name</th>
                                                <th>Status</th>
                                                <th>Comment</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($commandes as $commande)
                                                <tr>
                                                    <td>{{ $commande->client->nom }}</td>
                                                    <td><span class="label {{ ($commande->status) ? 'label-success' : 'label-danger' }}">{{ ($commande->status) ? "Paid" : "not paid" }}</span></td>
                                                    <td>{{ $commande->comment }}</td>
                                                    <td>{{ $commande->created_at }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Button group">
                                                            <a href="{{ route("commande.show", $commande) }}" class="btn btn-success">Show</a>
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
