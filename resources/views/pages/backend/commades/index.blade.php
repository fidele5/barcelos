@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">Commandes</h4>
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
                                                            <a href="{{ route("commande.show", $commande) }}" class="btn btn-outline-success">Show</a>

                                                                <a data-toggle="modal" data-target="#createmodel{{ $commande->id }}" class="btn btn-outline-primary">Delivery</a>

                                                            <a href="{{ route("commande.destroy", $commande) }}" class="btn btn-outline-danger delete">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Create Modal -->
                                                <div class="modal fade" id="createmodel{{ $commande->id }}" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" action="{{ route("delivery.store") }}">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt mr-2"></i> Assigner a un livreur</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="input-group mb-3">
                                                                        <button type="button" class="btn btn-info"><i
                                                                                class="ti-user text-white"></i></button>
                                                                        <select name="user_id" class="form-control">
                                                                            @foreach ($delivery_men as $user)
                                                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <input type="hidden" value="{{ $commande->id }}" name="commande_id">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
