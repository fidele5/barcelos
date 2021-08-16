@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">Delivery</h4>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Delivery man</th>
                                                <th>Status</th>
                                                <th>From adress</th>
                                                <th>To adress</th>
                                                <th>Date</th>
                                                <th>Commande</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($deliveries as $delivery)
                                                <tr>
                                                    <td>{{ $delivery->user->name }}</td>
                                                    <td><span class="label {{ (count($delivery->delivereds) > 0) ? 'label-success' : 'label-warning' }}">{{ (count($delivery->delivereds) > 0) ? "Delivered" : "Pending" }} </span></td>
                                                    <td>{{ $delivery->from_adress }}</td>
                                                    <td>{{ $delivery->to_adress }}</td>
                                                    <td>{{ $delivery->sent_at }}</td>
                                                    <td>{{ $delivery->command_id }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Button group">
                                                            @if (count($delivery->delivereds) > 0)
                                                                <a href="{{ route("delivereds",$delivery) }}" class="btn btn-outline-success">View</a>
                                                            @else
                                                                <a href="{{ route("delivered",$delivery) }}" class="btn btn-outline-success">Delivered</a>
                                                            @endif

                                                            <a href="{{ route("delivery.destroy",$delivery) }}" class="btn btn-outline-info delete">Delete</a>
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
