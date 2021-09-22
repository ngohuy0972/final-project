<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('home.index')}}"><img src="{{asset('frontend/img/logo/logo.png')}}" alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>                                                
                            <ul id="navigation">  
                                <li><a href="{{route('home.index')}}">Home</a></li>
                                <li><a href="{{route('shop.index')}}">Shop</a></li>
                                <li><a href="{{route('about.index')}}">About</a></li>
                                {{-- <li class="hot"><a href="#">Latest</a>
                                    <ul class="submenu">
                                        <li><a href="shop.html"> Product list</a></li>
                                        <li><a href="product_details.html"> Product Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">Blog</a>
                                    <ul class="submenu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Pages</a>
                                    <ul class="submenu">
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="elements.html">Element</a></li>
                                        <li><a href="confirmation.html">Confirmation</a></li>
                                        <li><a href="checkout.html">Product Checkout</a></li>
                                    </ul>
                                </li> --}}
                                <li><a href="{{route('contact.index')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="nav-search search-switch">
                                    <span class="flaticon-search"></span>
                                </div>
                            </li>
                            <li style="margin-top: -7px">
                                <a class="nav-link flaticon-shopping-cart cart" href="{{ route('cart')}}" style="color:#000;">
                                    <p class="total-qty">{{$cart->total_quantity}}</p>
                                </a>
                            </li>

                            <!-- Authentication Links -->
                            @guest
                            {{-- Route::has : check route('login') already exists --}}
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a href="{{route('login')}}"><span class="flaticon-user"></span></a>
                                </li>
                            @endif
                            @else
                                <li style="margin-top: -7px">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle username-logout" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right logout-toggle dropdown-profile" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profiles.index') }}">
                                            {{ __('Profile') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            {{-- <div class="search-section"> --}}
                <form class="search-model-form" action="{{route('search-results')}}" method="GET" autocomplete="off">
                    <input type="text" id="search-input" name="keyword" placeholder="Searching key.....">
                </form>
                <div id="search-item-list">
                    
                </div>
            {{-- </div> --}}
        </div>
    </div>
    <!-- Search model end -->
</header>
<script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script>
    $('#search-input').keyup(function(){
        var keyword = document.getElementById('search-input').value;
        // alert(keyword);
        if(keyword != null) {
            $.ajax({
                url: "{{ route('search') }}",
                method: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    keyword:keyword
                },
                success: function(data){
                    $('#search-item-list').fadeIn(data);
                    $('#search-item-list').html(data);
                }
            })
        } else {
            $('#search-item-list').fadeOut(data);
        }

        $(document).on('click', '.item-search-results', function(){
            $('#search-input').val($(this).text());
            $('#search-item-list').fadeOut();
        });
    })
</script>