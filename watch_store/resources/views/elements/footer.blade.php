
<footer>
    <!-- subscribe part here -->
  <section class="subscribe_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="subscribe_part_content">
                    <h2>Get promotions & updates!</h2>
                    <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                    <div class="subscribe_form">
                        <form action="{{ route('subscribe')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="email" class="@error('subscribe_email') is-invalid @enderror" value="{{ old('subscribe_email') }}" name="subscribe_email" placeholder="Enter your mail">
                            @error('subscribe_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="submit" class="btn_1">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe part end -->
<!-- Footer Start-->
<div class="footer-area footer-padding">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                <div class="single-footer-caption mb-50">
                    <div class="single-footer-caption mb-30">
                        <!-- logo -->
                        <div class="footer-logo">
                            <a href="{{ route('home.index')}}"><img src="{{asset('frontend/img/logo/logo2_footer.png')}}" alt=""></a>
                        </div>
                        <div class="footer-tittle">
                            <div class="footer-pera">
                                <p>Welcome to Watch Store</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-5">
                <div class="single-footer-caption mb-50">
                    <div class="footer-tittle">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="{{route('shop.index')}}">Shop</a></li>
                            <li><a href="{{route('about.index')}}">About</a></li>
                            <li><a href="{{route('contact.index')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                <div class="single-footer-caption mb-50">
                    <div class="footer-tittle">
                        <h4>Watch Shop</h4>
                        <ul>
                            <li><a href="{{ route('sort-new')}}">New Arrivals</a></li>
                            <li><a href="{{ route('sort-price')}}">Low Price</a></li>
                            <li><a href="{{ route('sort-name')}}">Name A-Z</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                <div class="single-footer-caption mb-50">
                    <div class="footer-tittle">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Report a Payment Issue</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer bottom -->
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-8 col-md-7">
                <div class="footer-copy-right">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with Huybapp</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>                  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End-->
    {{-- <a id="scroll-up" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fas fa-level-up-alt"></i></a> --}}
</footer>