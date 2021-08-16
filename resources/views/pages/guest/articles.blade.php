@extends('pages.guest.layout.template')

@section('content')
<!-- Browse by category -->
    <div class="most-popular section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 browse-cat border-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header-left">
                                <h3 class="text-light-black header-title title-2">Categories <small><a href="#" class="text-dark-white fw-600">{{ count($categories) }}</a></small></h3>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="popular-item-slider swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($categories as $categorie)
                                        <div class="swiper-slide">
                                            <a href="restaurant.html" class="categories">
                                                <div class="icon text-custom-white bg-light-green ">
                                                    <img src="{{ $categorie->thumbnails }}" class="rounded-circle" alt="categories">
                                                </div> <span class="text-light-black cat-name">{{ $categorie->designation }}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="section-header-left">
                                <h3 class="text-light-black header-title title mt-2">Offers near you</h3>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="near-offer-slider swiper-container  mb-xl-20">
                                <div class="swiper-wrapper">
                                    @foreach ($articles as $article)
                                        <div class="swiper-slide">
                                            <div class="product-box">
                                                <div class="product-img">
                                                    <a href="{{ route("article.show", $article) }}">
                                                        <img src="{{ $article->thumbnails }}" class="img-fluid full-width" alt="product-img">
                                                    </a>
                                                </div>
                                                <div class="product-caption">
                                                    <div class="title-box">
                                                        <h6 class="product-title"><a href="{{ route("article.show", $article) }}" class="text-light-black">{{ $article->designation }}</a></h6>
                                                    </div>
                                                    <p class="text-light-white text-truncate" style="max-width: 150px">{{ $article->description }}</p>
                                                    <div class="product-details">
                                                        <div class="price-time">
                                                            <span class="text-light-white price">${{ $article->price }}</span>
                                                        </div>
                                                        <a href="{{ route("article.show", $article) }}" class="btn btn-danger ml-auto"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="col-12">

                            <div class="custom-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
