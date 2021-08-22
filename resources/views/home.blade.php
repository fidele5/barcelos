@extends('layouts.app')

@section('content')
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Earnings -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Earnings</h4>
                                <h5 class="card-subtitle">Total Earnings of the Month</h5>
                                <h2 class="font-medium">${{ getTotalSells() }}</h2>
                            </div>
                            <div class="earningsbox mt-1" style="height:78px; width:100%;"></div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-sm-12 col-lg-8">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <h4 class="card-title">Overview</h4>
                                <h5 class="card-subtitle">Total Earnings of the Month</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mt-2">
                                    <!-- col -->
                                    <div class="col-md-6 col-sm-12 col-lg-4">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2"><span class="text-orange display-5"><i class="mdi mdi-wallet"></i></span></div>
                                            <div><span class="text-muted">Net Profit</span>
                                                <h3 class="font-medium mb-0">${{ getNetProfit() }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <!-- col -->
                                    <div class="col-md-6 col-sm-12 col-lg-4">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2"><span class="text-primary display-5"><i class="mdi mdi-basket"></i></span></div>
                                            <div><span class="text-muted">Product sold</span>
                                                <h3 class="font-medium mb-0">{{ getSoldArticles() }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <!-- col -->
                                    <div class="col-md-6 col-sm-12 col-lg-4">
                                        <div class="d-flex align-items-center">
                                            <div class="mr-2"><span class="display-5"><i class="mdi mdi-account-box"></i></span></div>
                                            <div><span class="text-muted">New Customers</span>
                                                <h3 class="font-medium mb-0">{{ allCLients() }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Product Sales -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Product Sales</h4>
                                        <h5 class="card-subtitle">Total Earnings of the Month</h5>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <!-- Tabs -->
                                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#week" role="tab" aria-selected="false">Week</a>
                                            </li>
                                        </ul>
                                        <!-- Tabs -->
                                    </div>
                                </div>
                                <div class="tab-content mt-3" id="pills-tabContent2">
                                    <div class="tab-pane fade show active" id="week" role="tabpanel" aria-labelledby="pills-profile-tab2">
                                        <div class="rates" style="height:400px; width:100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Orders -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Products of the Month</h4>
                                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                                    </div>
                                </div>
                                <!-- title -->
                                <div class="table-responsive scrollable mt-2" style="height:400px;">
                                    <table class="table v-middle">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Client name</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Comment</th>
                                                <th class="border-top-0">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (getMonthlySells() as $commande)
                                                <tr>
                                                    <td>{{ $commande->client->nom }}</td>
                                                    <td><span class="label {{ ($commande->status) ? 'label-success' : 'label-danger' }}">{{ ($commande->status) ? "Paid" : "not paid" }}</span></td>
                                                    <td>{{ $commande->comment }}</td>
                                                    <td>{{ $commande->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <h4 class="card-title">Order Stats</h4>
                                <h5 class="card-subtitle">Overview of orders</h5>
                                <div class="statuses mt-4" style="height:280px; width:100%"></div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-circle text-primary"></i>
                                        <h3 class="mb-0 font-medium">{{ getSuccesCmd(true) }}</h3>
                                        <span>Success</span>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-circle text-info"></i>
                                        <h3 class="mb-0 font-medium">{{ getSuccesCmd(false) }}</h3>
                                        <span>Pending</span>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-circle text-orange"></i>
                                        <h3 class="mb-0 font-medium">{{ getSuccesCmd(false) }}</h3>
                                        <span>Failed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@endsection
