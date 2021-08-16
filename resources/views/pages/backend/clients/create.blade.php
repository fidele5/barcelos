@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route("client.store") }}" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Add Client</h4>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="row m-auto">
                                        @csrf
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname3" class="control-label col-form-label">Name</label>
                                                <input type="text" class="form-control champ" name="nom" id="fname3" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="prenom" class="control-label col-form-label">Prenom</label>
                                                <input type="text" class="form-control champ" name="prenom" id="prenom" placeholder="Prenom">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="phone" class="control-label col-form-label">Phone</label>
                                                    <input type="tel" class="form-control champ" name="phone" id="phone" placeholder="Phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="adresse" class="control-label col-form-label">Adresse</label>
                                                    <input type="text" class="form-control champ" id="adresse" name="adresse" placeholder="Adresse">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="control-label col-form-label">Utilisateur</label>
                                                <select name="user_id" class="form-control">
                                                    <option disabled>Associer a un utilisateur</option>
                                                    @foreach ($users as $user)
                                                         <option value="{{ $user->id }}">{{ $user->name }}</option>
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
