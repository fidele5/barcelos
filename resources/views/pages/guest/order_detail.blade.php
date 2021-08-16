@extends('pages.guest.layout.template')

@section('content')
  <!-- tracking map -->
    <section class="checkout-page section-padding bg-light-theme">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="recipt-sec padding-20">
                        <div class="recipt-name title u-line full-width mb-xl-20">
                            <div class="recipt-name-box">
                                <h5 class="text-light-black fw-600 mb-2">Votre pannier</h5>
                                <p class="text-light-white ">Estimated Delivery time</p>
                            </div>
                            <div class="countdown-box">
                                <div class="time-box"> <span id="mb-hours"></span>
                                </div>
                                <div class="time-box"> <span id="mb-minutes"></span>
                                </div>
                                <div class="time-box"> <span id="mb-seconds"></span>
                                </div>
                            </div>
                        </div>
                        <div class="u-line mb-xl-20">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="recipt-name full-width padding-tb-10 pt-0">
                                        <h5 class="text-light-black fw-600">Delivery (ASAP) to:</h5>
                                        <span class="text-light-white ">{{ Auth::user()->name }}</span>
                                        <span class="text-light-white ">{{ Auth::user()->client->prenom }}</span>
                                        <span class="text-light-white ">{{ Auth::user()->email }}</span>
                                        <span class="text-light-white ">{{ Auth::user()->client->adresse }}</span>
                                        <p class="text-light-white ">{{ Auth::user()->client->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="recipt-name full-width padding-tb-10 pt-0">
                                        <h5 class="text-light-black fw-600">Delivery instructions</h5>
                                        <p class="text-light-white ">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ad-banner padding-tb-10 h-100">
                                        <img src="/assets/img/details/banner.jpg" class="img-fluid full-width" alt="banner-adv">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="u-line mb-xl-20">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="text-light-black fw-600 title">Your Order <span><a href="#" class="fs-12">Print recipt</a></span></h5>
                                    <p class="title text-light-white">Nov 15, 2015 8:38pm <span class="text-light-black">Order #123456789012345</span>
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    @foreach (cardData(Auth::user()->client->id) as $item)
                                        <div class="checkout-product">
                                            <div class="img-name-value">
                                                <div class="product-img">
                                                    <a href="{{ route("article.show", $item->article_id) }}">
                                                        <img src="/{{ $item->article->thumbnails }}" style="width: 50%" alt="#">
                                                    </a>
                                                </div>
                                                <div class="product-value">
                                                    <span class="text-light-white">{{ $item->quantity }}</span>
                                                </div>
                                                <div class="product-name">
                                                    <span><a href="{{ route("article.show", $item->article_id) }}" class="text-light-white">{{ $item->article->designation }}</a></span>
                                                </div>
                                            </div>
                                            <div class="price">
                                                <span class="text-light-white">${{ $item->article->price }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="payment-method mb-md-40">
                                    <h5 class="text-light-black fw-600">Payment Method</h5>
                                    <div class="method-type"> <i class="far fa-credit-card text-dark-white"></i>
                                        <span class="text-light-white">Credit Card</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="price-table u-line">
                                    <div class="item"> <span class="text-light-white">Tax : </span>
                                        <span class="text-light-white">{{ getTotal(Auth::user()->client->id) * 0.16 }}</span>
                                    </div>
                                </div>
                                <div class="total-price padding-tb-10">
                                    <h5 class="title text-light-black fw-700">Total: <span>${{ (getTotal(Auth::user()->client->id) * 0.16) + getTotal(Auth::user()->client->id) }}</span></h5>
                                </div>
                            </div>
                            <div class="col-12 d-flex"> <a href="{{ route("checkout") }}" class="btn-first white-btn fw-600 help-btn">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tracking map -->
@endsection
