@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route("article.update", $article) }}" method="POST" enctype="multipart/form-data">
                                @method("patch")
                                <div class="card-body">
                                    <h4 class="card-title">Add Products</h4>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="row m-auto">
                                        @csrf
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname3" class="control-label col-form-label">Designation</label>
                                                <input type="text" class="form-control champ" name="designation" id="fname3" value="{{ $article->designation }}" placeholder="Designation">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                             <div class="form-group">
                                                <label class="control-label col-form-label">Categorie</label>
                                                <select name="categorie_id" class="form-control">
                                                    <option>Choisir une categorie</option>
                                                    <option>Desiging</option>
                                                    <option>Development</option>
                                                    <option>Videography</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="unit_price" class="control-label col-form-label">Prix unitaire</label>
                                                <input type="number" class="form-control champ" value="{{ $article->price }}" name="price" id="price" placeholder="Prix unitaire">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="unit" class="control-label col-form-label">Unite de commande</label>
                                                    <input type="number" class="form-control champ" name="sku" value="{{ $article->sku }}" id="unit" placeholder="Unite de commande">
                                                </div>
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
                                                    <textarea name="description" class="form-control champ" id="description" placeholder="Taper la description ici">{{ $article->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="control-label col-form-label">Locations</label>
                                                <select name="location_id" class="form-control">
                                                    <option disabled>Choisir une location</option>
                                                    @foreach ($locations as $location)
                                                         <option value="{{ $location->id }}" {{ ($location->id == $article->location_id)?"selected":"" }}>{{ $location->designation }}</option>
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
