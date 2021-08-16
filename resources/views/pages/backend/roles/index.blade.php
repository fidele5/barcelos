@extends("layouts.app")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex no-block align-items-center mb-4">
                            <h4 class="card-title">Roles</h4>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th width="3%">Name</th>
                                        <th width="3%">Guard</th>
                                        <th width="8%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->guard_name }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <a href="{{ route('roles.destroy',$role->id) }}"  class="delete"><i class="bx bx-trash text-danger"></i></a>
                                                    </div>
                                                </td>
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
    </div>
    <!-- /.container-fluid -->
@endsection

