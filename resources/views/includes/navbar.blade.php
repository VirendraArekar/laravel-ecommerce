<!-- ##### Header Area Start ##### -->

<header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
        <a class="nav-brand" href="{{url('/')}}"><img src="{{url('img/core-img/logo.png')}}" alt=""></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a href="#">Shop</a>
                            <div class="megamenu">
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Women's Collection</li>
                                    <li><a href="{{url('woman/Dresses')}}">Dresses</a></li>
                                    <li><a href="{{url('woman/Blouses')}}">Blouses &amp; Shirts</a></li>
                                    <li><a href="{{url('woman/tshirt')}}">T-shirts</a></li>
                                    <li><a href="{{url('woman/rompers')}}">Rompers</a></li>
                                    <li><a href="{{url('woman/bras &amp panties')}}">Bras &amp; Panties</a></li>
                                </ul>
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Men's Collection</li>
                                    <li><a href="{{url('men/tshirt')}}">T-Shirts</a></li>
                                    <li><a href="{{url('men/shirt')}}">Shirts</a></li>
                                    <li><a href="{{url('men/jacket')}}">Jackets</a></li>
                                </ul>
                                <ul class="single-mega cn-col-4">
                                    <li class="title">Kid's Collection</li>
                                    <li><a href="{{url('kid/tshirt')}}">T-shirts</a></li>
                                    <li><a href="{{url('kid/shirt')}}">Shirts</a></li>
                                    <li><a href="{{url('kid/jacket')}}">Jackets</a></li>
                                </ul>
                                <div class="single-mega cn-col-4">
                                <img src="{{url('img/bg-img/bg-6.jpg')}}" alt="">
                                </div>
                            </div>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
            <!-- Search Area -->
            <div class="search-area">
               <form id="searchform" action="{{url('search/data')}}" method="get">
                    <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <!-- Favourite Area -->
            <div class="favourite-area">
            <a href="{{url('favorite')}}"><img src="{{asset('img/core-img/heart.svg')}}" alt=""></a>
            </div>
             <!-- Authentication Links -->
             @guest
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="{{ route('login') }}">Login</a>
                </div>
             @if (Route::has('register'))
                <div class="user-login-info">
                    <a href="{{ route('register') }}">Register</a>
                </div>
             @endif
         @else
         {{-- <div class="user-login-info ">
         <ul class="">
         <li><a href="#"><img src="{{url('img/core-img/user.svg')}}" alt=""></a>
                <div class="megamenu">
                <form action="{{ route('logout')}}" method="post">
                    @csrf
                    <ul class="single-mega cn-col-4">
                        <li class="title"><button type="submit">Log out</button></li>
                    </ul>
                </form>
                </div>
            </li>
         </ul>
         </div> --}}

         <div class="user-login-info">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{url('img/core-img/user.svg')}}" alt="">
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{url('order')}}">My Orers</a>
              <a class="dropdown-item" href="{{url('profile')}}">Profile</a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout')}}" method="post">
                    @csrf
                        <button type="submit" class="dropdown-item">Log out</button>
                </form>
              </div>
         </div>

         @endguest
            <!-- Cart Area -->
            <div class="cart-area">
              <a href="#" id="essenceCartBtn"><img src="{{asset('img/core-img/bag.svg')}}" alt="">
                 <span id="count">
                     @if(Auth::user())
                       {{DB::table('carts')->count()}}
                     @else
                       0
                     @endif
                 </span></a>
            </div>
        </div>

    </div>
</header>
<!-- ##### Header Area End ##### -->
