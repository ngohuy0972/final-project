@extends('layouts.app')

@section('content')
<main>
  <!--? Hero Area Start-->
  <div class="slider-area ">
      <div class="single-slider slider-height2 d-flex align-items-center">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>Contacts Us</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--? Hero Area End-->
  <!-- ================ contact section start ================= -->
  <section class="contact-section">
      <div class="container">
          <div class="d-none d-sm-block mb-5 pb-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.9117061201882!2d108.21738045095391!3d16.07007094362812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421836a96318f1%3A0xe4827e620d81e0ac!2zNyBQYXN0ZXVyLCBI4bqjaSBDaMOidSAxLCBI4bqjaSBDaMOidSwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1631010240355!5m2!1svi!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>


          <div class="row">
              <div class="col-12">
                  <h2 class="contact-title">Send us your Message</h2>
              </div>
              <div class="col-lg-8">
                  <form class="form-contact contact_form" action="{{ route('contact-us-email') }}" method="POST">
                      @csrf
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <input required class="form-control valid" name="contact_name" id="name" type="text" placeholder="Enter your name">
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <input required class="form-control valid" name="contact_email" id="email" type="email" placeholder="Email">
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="form-group">
                                  <input required class="form-control" name="contact_subject" id="subject" type="text" placeholder="Enter Subject">
                              </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">
                                <textarea required class="form-control w-100" name="contact_message" id="message" cols="30" rows="9" placeholder=" Enter Message"></textarea>
                            </div>
                        </div>
                      </div>
                      <div class="form-group mt-3">
                          <button type="submit" class="all-button">Send feedback</button>
                      </div>
                  </form>
              </div>
              <div class="col-lg-3 offset-lg-1">
                  <div class="media contact-info">
                      <span class="contact-info__icon"><i class="ti-home"></i></span>
                      <div class="media-body">
                          <h3>Hai Chau district, Da Nang.</h3>
                          <p>Pasteur, K7/2A</p>
                      </div>
                  </div>
                  <div class="media contact-info">
                      <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                      <div class="media-body">
                          <h3>+84 856 787 657</h3>
                          <p>Call us anytime</p>
                      </div>
                  </div>
                  <div class="media contact-info">
                      <span class="contact-info__icon"><i class="ti-email"></i></span>
                      <div class="media-body">
                          <h3>huyngoit99@gmail.com</h3>
                          <p>Send us anytime!</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- ================ contact section end ================= -->
</main>
@endsection