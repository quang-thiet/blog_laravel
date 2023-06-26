<!-- Header-->
<header class="header navbar-expand-lg fixed-top ">
    <div class="container-fluid ">
        <div class="header-area ">
            <!--logo-->
            <div class="logo">
                <a href="index.html">
                    <img src="/client-assets/img/logo/logo-dark.png" alt="" class="logo-dark">
                    <img src="/client-assets/img/logo/logo-white.png" alt="" class="logo-white">
                </a>
            </div>
            <div class="header-navbar">
                <nav class="navbar">
                    <!--navbar-collapse-->
                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="{{ route('blog.home') }}"
                                    data-toggle="dropdown"> Home </a>
                                {{-- <ul class="dropdown-menu fade-up">
                                    <li>
                                        <a class="dropdown-item " href="index.html">Home 1</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="index-2.html">Home 2 </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item " href="index-3.html">Home 3 </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item active" href="index-4.html">Home 4</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="index-5.html">Home 5 </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="index-6.html">Home 6 </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="index-7.html">Home 7 </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="index-8.html">Home 8 </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="index-9.html">Home 9 </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"> Pages </a>
                                <ul class="dropdown-menu fade-up">
                                    <li>
                                        <a class="dropdown-item " href="contact.html"> Contact us </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="about.html"> About us</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="list-authors.html"> All authors </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="author.html"> Author </a>
                                    </li>
                                    
                                    <li>
                                        <a class="dropdown-item" href="search.html"> search page </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item " href="page404.html">page 404 </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="login.html"> login </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item " href="signup.html">Sign up </a>
                                    </li>
                                </ul>
                            </li>
            
                    
                            <li class="nav-item dropdown">
                                <a class="nav-link  dropdown-toggle " href="#" data-toggle="dropdown"> Blogs </a>
                                <ul class="dropdown-menu fade-up">
                                    <li>
                                        <a class="dropdown-item " href="blog-layout-1.html">Blog Layout 1</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="blog-layout-2.html">Blog Layout 2</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="blog-layout-3.html">Blog Layout 3</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="blog-layout-4.html">Blog Layout 4</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="blog-layout-5.html">Blog Layout 5</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item  " href="blog-layout-6.html">Blog Layout 6</a>
                                    </li>
                                </ul>
                            </li>
                        
                        
                            <li class="nav-item dropdown">
                                <a class="nav-link  dropdown-toggle " href="#" data-toggle="dropdown"> features </a>
                                <ul class="dropdown-menu fade-up">
                                    <li>
                                        <a class="dropdown-item " href="post-single.html">post Standard </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="post-layout-2.html">post layout 2</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item  " href="post-layout-3.html">post layout 3</a>
                                    </li>
                                </ul>
                            </li>
                        
                            <li class="nav-item dropdown">
                                <a class="nav-link  dropdown-toggle " href="#" data-toggle="dropdown"> shop </a>
                                <ul class="dropdown-menu fade-up">
                                    <li>
                                        <a class="dropdown-item " href="shop.html">shop list </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="shop-single.html">shop single</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="cart.html">cart</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="checkout.html">checkout</a>
                                    </li>
                                
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.html"> contact </a>
                            </li> --}}
                        </ul>
                    </div>
                    <!--/-->
                </nav>
            </div>

            <!--header-right-->
            <div class="header-right ">
                <!--theme-switch-->
                <div class="theme-switch-wrapper">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox" />
                        <span class="slider round ">
                            <i class="lar la-sun icon-light"></i>
                            <i class="lar la-moon icon-dark"></i>
                        </span>
                    </label>
                </div>

                <!--search-icon-->
                <div class="search-icon">
                    <i class="las la-search"></i>
                </div>
                <!--button-subscribe-->
                @if (!Auth::check())
                    <div class="botton-sub">
                        <a href="{{ route('login') }}" class="btn-subscribe">subscribe</a>
                    </div>
                    <div class="botton-sub">
                        <a href="{{ route('register') }}" class="btn-subscribe">register</a>
                    </div>
                @else
                    <div class="botton-sub">
                        <a href="{{ route('logout') }}" class="btn-subscribe">logout</a>
                    </div>
                    <div class="botton-sub">
                        <a href="{{ route('dashboard') }}" class="btn-subscribe">info</a>
                    </div>
                @endif
                <!--navbar-toggler-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </div>
</header>
