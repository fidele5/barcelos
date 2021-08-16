@extends('layouts.app')
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>INVOICE</b> <span class="pull-right">#5669626</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">Material Pro Admin</b></h3>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>To,</h3>
                                            <h4 class="font-bold">{{ $commande->client->nom }},</h4>
                                            <p class="text-muted m-l-30">{{ $commande->client->adresse }},</p>
                                            <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> {{ $commande->created_at }}</p>
                                            <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2018</p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Description</th>
                                                    <th class="text-right">Quantity</th>
                                                    <th class="text-right">Unit Cost</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($commande->articles as $article)
                                                    <tr>
                                                        <td class="text-center">{{ $article->id }}</td>
                                                        <td>{{ $article->designation }}</td>
                                                        <td class="text-right">{{ $article->pivot->quantity }} </td>
                                                        <td class="text-right"> ${{ $article->price }} </td>
                                                        <td class="text-right"> ${{ $article->price * $article->pivot->quantity }} </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>Sub - Total amount: ${{ $total }}</p>
                                        <p>vat (16%) : ${{ $total * 0.16 }} </p>
                                        <hr>
                                        <h3><b>Total :</b> ${{ $total + ($total * 0.16) }}</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
