    <!-- Navigation -->
    <div class="header">
        <header class="full-width">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mainNavCol">
                        <!-- logo -->
                        <div class="logo mainNavCol">
                            <a href="/">
                                <img src="/backend/assets/images/logo.png" style="width: 40%" class="img-fluid" alt="Logo">
                            </a>
                        </div>
                        <!-- logo -->
                        <div class="main-search mainNavCol">
                            <form class="main-search search-form full-width">
                                <div class="row">
                                    <!-- location picker -->
                                    <div class="col-lg-6 col-md-5">
                                        <a href="#" class="delivery-add p-relative"> <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                            <span class="address">{{ getLocation()->designation }}</span>
                                        </a>
                                        <div class="location-picker">
                                            <input type="text" class="form-control" placeholder="Enter a new address">
                                        </div>
                                    </div>
                                    <!-- location picker -->
                                    <!-- search -->
                                    <div class="col-lg-6 col-md-7">
                                        <div class="search-box padding-10">
                                            <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                                        </div>
                                    </div>
                                    <!-- search -->
                                </div>
                            </form>
                        </div>
                        <div class="right-side fw-700 mainNavCol">
                            <div class="gem-points">
                                <a href="/"> <i class="fas fa-concierge-bell"></i>
                                    <span>Order Now</span>
                                </a>
                            </div>
                            <div class="catring parent-megamenu">
                                <a href="{{ route("articles") }}"> <span>Ristorante</span>
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                            <!-- mobile search -->
                            <div class="mobile-search">
                                <a href="#" data-toggle="modal" data-target="#search-box"> <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <!-- mobile search -->
                            @if (Auth::check())
                            <!-- user account -->
                            <div class="user-details p-relative">
                                <a href="#" class="text-light-white fw-500">
                                    <img src="/{{ Auth::user()->avatar }}" style="width: 20px" class="rounded-circle" alt="userimg"> <span>Hi, {{ Auth::user()->name }}</span>
                                </a>
                                <div class="user-dropdown">
                                    <ul>
                                        <li>
                                            <a href="order-details.html">
                                                <div class="icon"><i class="flaticon-rewind"></i>
                                                </div> <span class="details">Past Orders</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="order-details.html">
                                                <div class="icon"><i class="flaticon-takeaway"></i>
                                                </div> <span class="details">Upcoming Orders</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="icon"><i class="flaticon-breadbox"></i>
                                                </div> <span class="details">Saved</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <div class="icon"><i class="flaticon-user"></i>
                                                </div> <span class="details">Account</span>
                                            </a>
                                        </li>

                                    </ul>
                                    <div class="user-footer"> <span class="text-light-black">Not Jhon?</span>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __("pages.logout") }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- mobile search -->
                            <!-- user cart -->
                            <div class="cart-btn cart-dropdown">
                                <a href="#" class="text-light-green fw-700"> <i class="fas fa-shopping-bag"></i>
                                    <span class="user-alert-cart">{{ count(cardData(Auth::user()->client->id)) }}</span>
                                </a>
                                <div class="cart-detail-box">
                                    <div class="card">
                                        <div class="card-header padding-15">Vos commandes ({{ count(cardData(Auth::user()->client->id)) }})</div>
                                        <div class="card-body no-padding">
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
                                                            <a href="{{ route("cart.destroy", $item) }}" class="text-dark-white"> <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div class="price">
                                                            <a href="{{ route("article.show", $item->article_id) }}" class="text-dark-white fw-500">${{ $item->article->price }}</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if (count(cardData(Auth::user()->client->id)) > 0)
                                                <div class="item-total">
                                                    <div class="total-price border-0"> <span class="text-dark-white fw-700">Items subtotal:</span>
                                                        <span class="text-dark-white fw-700">${{ getTotal(Auth::user()->client->id) }}</span>
                                                    </div>
                                                    <div class="empty-bag padding-15"> <a href="#">Empty bag</a>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                        @if (count(cardData(Auth::user()->client->id)) > 0)
                                            <div class="card-footer padding-15">
                                                <a href="{{ route("cart.show", 1) }}" class="btn-first green-btn text-custom-white full-width fw-500">Proceed to Checkout</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="gem-points">
                                    <a href="{{ route("login") }}">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                        Login
                                    </a>
                                </div>
                            @endif

                            <!-- user cart -->
                        </div>
                    </div>
                    <div class="col-sm-12 mobile-search">
                        <div class="mobile-address">
                            <a href="#" class="delivery-add" data-toggle="modal" data-target="#address-box"> <span class="address">Brooklyn, NY</span>
                            </a>
                        </div>
                        <div class="sorting-addressbox"> <span class="full-address text-light-green">Brooklyn, NY 10041</span>
                            <div class="btns">
                                <div class="filter-btn">
                                    <button type="button"><i class="fas fa-sliders-h text-light-green fs-18"></i>
                                    </button> <span class="text-light-green">Sort</span>
                                </div>
                                <div class="filter-btn">
                                    <button type="button"><i class="fas fa-filter text-light-green fs-18"></i>
                                    </button> <span class="text-light-green">Filter</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="main-sec"></div>
