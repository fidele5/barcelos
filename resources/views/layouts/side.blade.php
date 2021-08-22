        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown mt-3">
                                <div class="user-pic"><img src="/{{ Auth::user()->avatar }}" alt="users" class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu ml-2">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="mb-0 user-name font-medium">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><span class="__cf_email__" data-cfemail="56203724233816313b373f3a7835393b">[email&#160;protected]</span></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" aria-expanded="false" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off mr-1 ml-1"></i>{{ __("pages.logout") }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <!-- User Profile-->
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="/" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard </span></a></li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Apps</span></li>
                        @can("manage_todo")
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route("message.index") }}" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Invoice</span></a></li>
                        @endcan
                        @can("manage_category")
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span class="hide-menu">Settings </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="{{ route("categorie.index") }}" class="sidebar-link"><i class="mdi mdi-comment-processing-outline"></i><span class="hide-menu"> Categories</span></a></li>
                                    <li class="sidebar-item"><a href="{{ route("location.index") }}" class="sidebar-link"><i class="mdi mdi-calendar"></i><span class="hide-menu"> Locations  </span></a></li>
                                </ul>
                            </li>
                        @endcan


                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="shopping-cart" class="feather-icon"></i><span class="hide-menu">Ecommerce Pages</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                @canany(["manage_product", "manage_sell_invoice", "create_sell_invoice", "manage_supplier_payment"])
                                    <li class="sidebar-item"><a href="{{ route("article.index") }}" class="sidebar-link"><i class="mdi mdi-cards-variant"></i> <span class="hide-menu">Products</span></a></li>
                                    <li class="sidebar-item"><a href="{{ route("commande.index") }}" class="sidebar-link"><i class="mdi mdi-chart-pie"></i> <span class="hide-menu">Product Orders</span></a></li>
                                @endcan
                                @can("manage_requisition")
                                    <li class="sidebar-item"><a href="{{ route("delivery.index") }}" class="sidebar-link"><i class="mdi mdi-clipboard-check"></i> <span class="hide-menu">Delivery</span></a></li>
                                @endcan

                            </ul>
                        </li>

                        @canany(["manage_user", "application_setting"])
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span class="hide-menu">Users</span></a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item"><a href="{{ route("user.index") }}" class="sidebar-link"><i class="mdi mdi-account-box"></i> <span class="hide-menu"> Users </span></a></li>
                                    <li class="sidebar-item"><a href="{{ route("client.index") }}" class="sidebar-link"><i class="mdi mdi-account-network"></i><span class="hide-menu"> Clients</span></a></li>
                                    <li class="sidebar-item"><a href="{{ route("roles.index") }}" class="sidebar-link"><i class="mdi mdi-account-star-variant"></i><span class="hide-menu"> Roles</span></a></li>
                                    <li class="sidebar-item"><a href="{{ route("permissions") }}" class="sidebar-link"><i class="mdi mdi-account-star-variant"></i><span class="hide-menu"> Permissions</span></a></li>
                                </ul>
                            </li>
                        @endcan
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Extra</span></li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i data-feather="log-out" class="feather-icon"></i>{{ __("pages.logout") }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
