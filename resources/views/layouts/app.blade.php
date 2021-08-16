@include("layouts.header")
@include("layouts.nav")
@include("layouts.side")
        <div class="page-wrapper">
            @include("layouts.breadcumb")
            @yield('content')
            <footer class="footer text-center">
                All Rights Reserved by Xtreme admin. Designed and Developed by <a href="https://wrappixel.com/">WrapPixel</a>.
            </footer>
        </div>
@include("layouts.footer")
