@extends('pages.guest.layout.template')

@section('content')
 <section class="final-order section-padding bg-light-theme">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="main-box padding-20">
                        <div class="row mb-xl-20">
                            <div class="col-md-6">
                                <div class="section-header-left">
                                    <h3 class="text-light-black header-title fw-700">Review and place order</h3>
                                </div>
                                <h6 class="text-light-black fw-700 fs-14">Review address, payments, and tip to complete your purchase</h6>
                                <h6 class="text-light-black fw-700 mb-2">Your order setting</h6>
                                <p class="text-light-green fw-600">Delivery, ASAP (60-70m)</p>
                                <p class="text-light-white title2 mb-1">{{ Auth::user()->name }} <span><a href="#">Change Details</a></span>
                                </p>
                                <p class="text-light-black fw-600 mb-1">Home</p>
                                <p class="text-light-white mb-1">314 79th st 70 Brooklyn, NY 11209
                                    <br>Cross Street, Rite Aid</p>
                                <p class="text-light-white">(347) 1234567890</p>
                            </div>
                            <div class="col-md-6">
                                <div class="advertisement-img">
                                    <img src="assets/img/checkout.jpg" class="img-fluid full-width" alt="advertisement-img">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="payment-sec">
                                    <div class="section-header-left">
                                        <h3 class="text-light-black header-title">Delivery Instructions</h3>
                                    </div>
                                    <form method="post">
                                        <div class="form-group">
                                            <textarea class="form-control form-control-submit" name="comment" rows="4" placeholder="Delivery Details"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div id="accordion">
                                                    <div class="payment-option-tab">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="savecreditcard">
                                                                <div class="form-group">
                                                                    <button type="button" id="payer" class="full-width fw-500">Place Your Order</button>
                                                                </div>
                                                                <p class="text-center text-light-black no-margin">By placing your order, you agree to Quickmunc <a href="#">terms</a> and <a href="#">privacy agreement</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="cart-detail-box">
                            <div class="card">
                                <div class="card-header padding-15 fw-700">Your order from
                                    <p class="text-light-white no-margin fw-500">{{ Auth::user()->name }}</p>
                                </div>
                                <div class="card-body no-padding" id="scrollstyle-4">
                                    <div class="cat-product-box">
                                        @foreach (cardData(Auth::user()->client->id) as $item)
                                            <div class="cat-product">
                                                <div class="cat-name">
                                                    <a href="{{ route("article.show", $item->article_id) }}">
                                                        <p class="text-light-green"><span class="text-dark-white">{{ $item->quantity }}</span> {{ $item->article->designation }}</p>
                                                        <span class="text-light-white text-truncate" style="max-width: 50px"> {{ $item->article->description }} </span>
                                                    </a>
                                                </div>
                                                <div class="delete-btn">
                                                    <a href="{{ route("cart.destroy", $item) }}" class="text-dark-white">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                                <div class="price">
                                                    <a href="{{ route("article.show", $item->article_id) }}" class="text-dark-white fw-500">${{ $item->article->price }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="item-total">
                                        <div class="total-price border-0 pb-0"> <span class="text-dark-white fw-600">Sous total:</span>
                                            <span class="text-dark-white fw-600">{{ getTotal(Auth::user()->client->id) }}</span>
                                        </div>
                                        <div class="total-price border-0 "> <span class="text-dark-white fw-600"> Tax:</span>
                                            <span class="text-dark-white fw-600">${{ getTotal(Auth::user()->client->id) * 0.16 }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer p-0 modify-order">
                                    <button class="text-custom-white full-width fw-500 bg-light-green"><i class="fas fa-chevron-left mr-2"></i> Modify Your Order</button>
                                    <a href="#" class="total-amount"> <span class="text-custom-white fw-700">TOTAL</span>
                                        <span class="text-custom-white fw-700">${{ (getTotal(Auth::user()->client->id) * 0.16) + getTotal(Auth::user()->client->id) }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
