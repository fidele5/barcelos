@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route("categorie.update", $categorie) }}" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Categories</h4>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="row m-auto">
                                        @csrf
                                        @method("patch")
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname3" class="control-label col-form-label">Designation</label>
                                                <input type="text" class="form-control champ" name="designation" value="{{ $categorie->designation }}" id="fname3" placeholder="Designation">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname3" class="control-label col-form-label">Code</label>
                                                <input type="text" class="form-control champ" name="code" id="fname3" value="{{ $categorie->code }}" placeholder="Code">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="thumbnails" class="control-label col-form-label">Thumbnails</label>
                                                    <input type="file" class="form-control-file champ" id="thumbnails" name="thumbnails" placeholder="Selectionner une image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="description" class="control-label col-form-label">Description</label>
                                                    <textarea name="description" class="form-control champ" id="description" placeholder="Taper la description ici">{{ $categorie->description }}</textarea>
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
