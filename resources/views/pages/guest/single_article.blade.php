@extends('pages.guest.layout.template')

@section('content')
    <!-- restaurent top -->
    <div class="page-banner p-relative smoothscroll" id="menu">
        <img src="/assets/img/banner.jpg" class="img-fluid full-width" alt="banner">
        <div class="overlay-2">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="back-btn">
                            <button type="button" class="text-light-green"> <i class="fas fa-chevron-left"></i></button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="tag-share">
                            <span class="text-light-green share-tag">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- restaurent about -->
    <section class="section-padding restaurent-about smoothscroll" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light-black fw-700 title">{{ $article->designation }}</h3>
                    <p class="text-light-green no-margin">
                        ingredients
                    </p>
                    <p class="text-light-white no-margin">
                        {{ $article->description }}
                    </p>
                    <span class="text-success fs-16">$</span>
                    <span class="text-dark-white fs-16">{{ $article->price }}</span>
                    <div>
                        <form action="{{ route("cart.store") }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input class="form-control col-3" type="number" name="quantity" placeholder="Quantity" required>
                            </div>
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <button class="btn btn-cycan mt-2 text-white"><i class="fa fa-cart-plus text-white" aria-hidden="true"></i> Add to cart</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="restaurent-schdule">
                        <div class="card">
                            <div class="card-header text-light-white fw-700 fs-16">Hours</div>
                            <div class="card-body">
                                <div class="schedule-box">
                                    <div class="day text-light-black">Monday</div>
                                    <div class="time text-light-black">Delivery: 7:00am - 10:59pm</div>
                                </div>
                                <div class="collapse" id="schdule">
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Tuesday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"> <a class="fw-500 collapsed" data-toggle="collapse" href="#schdule">See the full schedule</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent about -->

    <!-- offer near -->
    <section class="fresh-deals section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Offers near you</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="fresh-deals-slider swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($article->categorie->articles as $related)
                                <div class="swiper-slide">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <a href="{{ route("article.show", $related) }}">
                                                <img src="/{{ $article->thumbnails }}" class="img-fluid full-width" alt="product-img">
                                            </a>
                                        </div>
                                        <div class="product-caption">
                                            <div class="title-box">
                                                <h6 class="product-title"><a href="{{ route("article.show", $related) }}" class="text-light-black">{{ $related->designation }}</a></h6>
                                            </div>
                                            <p class="text-light-white">{{ $related->description }}</p>
                                            <div class="product-details">
                                                <div class="price-time">
                                                    <span class="text-light-white price">${{ $related->price }}</span>
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
            </div>
        </div>
    </section>
    <!-- offer near -->
@endsection
