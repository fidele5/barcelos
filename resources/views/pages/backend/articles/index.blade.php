@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center mb-4">
                                    <h4 class="card-title">Articles</h4>
                                    <div class="ml-auto">
                                        <a href="{{ route("article.create") }}" class="btn btn-outline-primary">Create</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Designation</th>
                                                <th>Description</th>
                                                <th>Thumbnails</th>
                                                <th>Category</th>
                                                <th>Unit</th>
                                                <th>Price</th>
                                                <th>Location</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($articles as $article)
                                                <tr>
                                                    <td>{{ $article->designation }}</td>
                                                    <td>{{ $article->description }}</td>
                                                    <td>{{ $article->thumbnails }}</td>
                                                    <td>{{ $article->categorie->designation }}</td>
                                                    <td>{{ $article->sku }}</td>
                                                    <td>{{ $article->price }}</td>
                                                    <td>{{ $article->location->designation }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Button group">
                                                            <a href="{{ route("article.edit", $article) }}" class="btn btn-outline-info">Edit</a>
                                                            <a href="{{ route("article.destroy", $article) }}" class="btn btn-outline-info delete">Delete</a>
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
