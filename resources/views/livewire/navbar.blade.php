<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('images/Apni.svg') }}" width="150px" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav ">
                            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item {{ Request::is('ad') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('ad') }}">All Ads</a>
                            </li>
                            <li class="nav-item {{ Request::is('chat') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('chat') }}">Chats</a>
                            </li>
                            <li class="nav-item {{ Request::is('about-us') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('about-us') }}">About Us</a>
                            </li>
                            <li class="nav-item {{ Request::is('contact-us') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('contact-us') }}">Contact Us</a>
                            </li>
                        </ul>



                        @guest
                            @if (Route::has('login'))
                                <ul class="navbar-nav ml-auto mt-10">
                                    <li class="nav-item">
                                        <a class="nav-link login-button" href="{{ route('login') }}">Login</a>
                                    </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="{{ url('ad/create') }}"><i
                                            class="fa fa-plus-circle"></i> Add Listing</a>
                                </li>
                                </ul>
                            @endif
                        @else
                            <ul class="navbar-nav ml-auto mt-10">

                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="{{ url('ad/create') }}"><i
                                            class="fa fa-plus-circle"></i> Add Listing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white login-button bg-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>Logout {{ Auth::user()->name }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>

                                </li>
                            </ul>
                        @endguest



                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
