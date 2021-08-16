@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route("location.update", $location) }}" method="POST">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Locations</h4>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="row m-auto">
                                        @csrf
                                        @method("patch")
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname3" class="control-label col-form-label">Designation</label>
                                                <input type="text" class="form-control champ" name="designation" value="{{ $location->designation }}" id="fname3" placeholder="Designation">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname3" class="control-label col-form-label">Adresse</label>
                                                <input type="text" class="form-control champ" name="adresse" id="fname3" value="{{ $location->adresse }}" placeholder="Adresse">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="description" class="control-label col-form-label">Description</label>
                                                    <textarea name="description" class="form-control champ" id="description" placeholder="Taper la description ici">{{ $location->description }}</textarea>
                                                </div>
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
