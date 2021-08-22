@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route("user.store") }}" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Add User</h4>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="row m-auto">
                                        @csrf
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname3" class="control-label col-form-label">Name</label>
                                                <input type="text" class="form-control champ" name="name" id="fname3" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="unit_price" class="control-label col-form-label">Email</label>
                                                <input type="email" class="form-control champ" name="email" id="price" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="unit" class="control-label col-form-label">Password</label>
                                                    <input type="password" class="form-control champ" name="password" id="unit" placeholder="Unite de commande">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="thumbnails" class="control-label col-form-label">Avatar</label>
                                                    <input type="file" class="form-control-file champ" id="thumbnails" name="avatar" placeholder="Selectionner une image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="control-label col-form-label">Locations</label>
                                                <select name="location_id" class="form-control">
                                                    <option disabled>Choisir une location</option>
                                                    @foreach ($locations as $location)
                                                         <option value="{{ $location->id }}">{{ $location->designation }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="control-label col-form-label">Role</label>
                                                <select name="role" class="form-control">
                                                    <option disabled>Choisir un role</option>
                                                    @foreach ($roles as $role)
                                                         <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <div class="action-form">
                                            <div class="form-group mb-0 text-center">
                                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                                <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
