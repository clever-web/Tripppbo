    <!-- navigation bar -->
    <nav class="navbar navbar-expand-xl navbar-light site_nav">
        <div class="container-lg pad_lg">
            <a class="navbar-brand" href="{{ route('home') }}"><img class="site_logo" src="/img/site_logo.svg" alt="Site logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <img src="/img/humburger.svg" alt="humburger icon">
            </button>
            <div class="collapse navbar-collapse navbar_collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar_nav ms-lg-2 me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs_14" href="{{ route('home') }}">Book a trip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs_14" href="{{ route('trips-browse') }}">fund my trip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs_14" href="{{ route('solos-browse') }}">fund my trip <span class="nav_span">solo</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs_14" href="{{ route('ticket-lottery-home') }}">ticket lottery</a>
                    </li>
                </ul>
                <div class="nav_right">
                    <a href="{{ route('login') }}" class="nav_btn_pink me-3 fs_14">Sign In</a>
                    <a href="{{ route('register') }}" class="nav_btn_pink fs_14">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>


