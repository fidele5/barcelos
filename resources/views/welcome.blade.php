@extends('pages.guest.layout.template')

@section('content')
<!-- slider -->
    <section class="about-us-slider swiper-container p-relative">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide-item">
                <img src="/assets/img/about/blog/1920x700/banner-4.jpg" class="img-fluid full-width" alt="Banner">
                <div class="transform-center">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7 align-self-center">
                                <div class="right-side-content">
                                    <h1 class="text-custom-white fw-600">Increase takeout sales by 50%</h1>
                                    <h3 class="text-custom-white fw-400">with the largest delivery platform in the U.S. and Canada</h3>
                                    <a href="{{ route("articles") }}" class="btn-second btn-submit">Learn More.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay overlay-bg"></div>
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>

    <!-- Categories -->
    <section class="browse-cat u-line section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Browse by cuisine <span class="fs-14"><a href="{{ route("articles") }}">See all restaurant</a></span></h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="category-slider swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($categories as $categorie)
                                <div class="swiper-slide">
                                    <a href="{{ route("articles") }}" class="categories">
                                        <div class="icon icon-parent text-custom-white bg-light-green"> <i class="fas fa-map-marker-alt"></i>
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
            </div>
        </div>
    </section>

    <!-- Explore collection -->
    <section class="ex-collection section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Explore our collections</h3>
                    </div>
                </div>
            </div>
            <!-- advertisement banner-->
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        @foreach ($articles as $article)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product-box mb-xl-20">
                                    <div class="product-img">
                                        <a href="{{ route("article.show", $article) }}">
                                            <img src="{{ $article->thumbnails }}" class="img-fluid full-width" alt="product-img">
                                        </a>
                                        <div class="overlay">
                                            <div class="product-tags padding-10">
                                                <span class="circle-tag">
                                                    <img src="/assets/img/svg/013-heart-1.svg" alt="tag">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-caption">
                                        <div class="title-box">
                                            <h6 class="product-title"><a href="{{ route("article.show", $article) }}" class="text-light-black ">{{ $article->designation }}</a></h6>
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
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="large-product-box mb-xl-20 p-relative">
                        <img src="assets/img/restaurants/255x587/Banner-3.jpg" class="img-fluid full-width" alt="image">
                        <div class="category-type overlay padding-15">
                            <button class="category-btn">Most popular near you</button> <a href="{{ route("articles") }}" class="btn-first white-btn text-light-black fw-600 full-width">See all</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="ex-collection-box mb-sm-20">
                        <img src="assets/img/restaurants/540x300/collection-3.jpg" class="img-fluid full-width" alt="image">
                        <div class="category-type overlay padding-15"> <a href="{{ route("articles") }}" class="category-btn">Top rated</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ex-collection-box">
                        <img src="assets/img/restaurants/540x300/collection-4.jpg" class="img-fluid full-width" alt="image">
                        <div class="category-type overlay padding-15"> <a href="{{ route("articles") }}" class="category-btn">Top rated</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Explore collection -->
    <div class="footer-top section-padding bg-black">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-credit-card-1"></i></span>
                        <span class="text-custom-white">100% Payment<br>Secured</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-wallet-1"></i></span>
                        <span class="text-custom-white">Support lots<br> of Payments</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-help"></i></span>
                        <span class="text-custom-white">24 hours / 7 days<br>Support</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-truck"></i></span>
                        <span class="text-custom-white">Free Delivery<br>with $50</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-guarantee"></i></span>
                        <span class="text-custom-white">Best Price<br>Guaranteed</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-app-file-symbol"></i></span>
                        <span class="text-custom-white">Mobile Apps<br>Ready</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
