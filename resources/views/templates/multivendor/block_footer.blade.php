@php
    /*
$layout_page = home
*/
    $categories = $modelCategory
        ->start()
        ->setSort(['created_at', 'asc'])
        ->setLimit(5)
        ->getData();
    //  dd($categories);
    $banners = $modelBanner
        ->start()
        ->setMoreWhere(['type', '=', 'banner'])
        ->getBanner()
        ->getData();

    //  dd($categories);
    $products_new = $modelProduct
        ->start()
        ->getProductLatest()
        ->getData();
    $products_hot = $modelProduct
        ->start()
        ->getProductLatest()
        ->setLimit(4)
        ->getData();
@endphp

<footer class="main">
  <section class="newsletter mb-15 wow animate__animated animate__fadeIn"
      style="visibility: hidden; animation-name: none;">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="position-relative newsletter-inner">
                      <div class="newsletter-content">
                          <h2 class="mb-20">
                              Nhận thông báo hàng ngày
                          </h2>
                          
                          <form class="form-subcriber d-flex" method="post" action="{{ sc_route('subscribe') }}">
                            @csrf
                              <input type="email" placeholder="Your emaill address" name="subscribe_email">
                              <button class="btn" type="submit">Đăng kí</button>
                          </form>
                      </div>
                      <img src="{{ sc_file($sc_templateFile.'/imgs/banner3.png')}}" style="height: 425px;"
                          alt="newsletter">
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="section-padding footer-mid">
      <div class="container pt-15 pb-20">
          <div class="row">
              <div class="col">
                  <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                      data-wow-delay="0" style="visibility: hidden; animation-name: none;">
                      <div class="logo mb-30">
                          <a href="{{ sc_route('home') }}" class="mb-15"><img style="max-width: 55%;"
                                  src="{{ sc_file(sc_store('logo', $storeId ?? null)) }}"
                                  alt="logo"></a>
                      </div>
                      <ul class="contact-infor">
                          <li><img src="./Nest - Multipurpose eCommerce HTML Template_files/icon-location.svg"
                                  alt=""><strong>Địa chỉ: </strong> <span> {{ sc_store('address', ($storeId ?? null)) }}</span></li>
                          <li><img src="./Nest - Multipurpose eCommerce HTML Template_files/icon-contact.svg"
                                  alt=""><strong>Số điện thoại:</strong><span> {{ sc_store('long_phone', ($storeId ?? null)) }}</span></li>
                          <li><img src="./Nest - Multipurpose eCommerce HTML Template_files/icon-email-2.svg"
                                  alt=""><strong>Email:</strong><span> {{ sc_store('email', ($storeId ?? null)) }}</span></li>
                          
                      </ul>
                  </div>
              </div>
              <div class="footer-link-widget col wow animate__animated animate__fadeInUp"> 
                <h4  class="widget-title">Thông tin</h4>
                  <ul class="footer-list mb-sm-5 mb-md-0">
                      <li><a href="adbout.html">Giới thiệu</a></li>
                      <li><a href="">Chính sách đổi trả</a>
                      </li>
                      <li><a href="">Chính sách giao hàng</a></li>
                      <li><a href="">Chính sách bảo vệ thông tin</a></li>
                      <li><a href="{{route('contact')}}">Liên hệ chúng tôi</a></li>
                  </ul>
              </div>
              <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s"
                  style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                  <h4 class="widget-title">Tài khoản</h4>
                  <ul class="footer-list mb-sm-5 mb-md-0">
                      <li><a href="{{route('contact')}}">Đăng ký</a></li>
                      <li><a href="{{route('cart')}}">Giỏ hàng</a></li>
                      <li><a href="{{route('wishlist')}}">Sản phẩm yêu thích</a></li>
                      <li><a href="{{route('home')}}">Thông tin cá nhân</a></li>
                      <li><a href="{{route('home')}}">Giao hàng</a></li>
                  </ul>
              </div>
        
              <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s"
                  style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                  <h4 class="widget-title">Danh mục sản phẩm</h4>
                  <ul class="footer-list mb-sm-5 mb-md-0">
                    @foreach ($categories as $category)
                      <li><a href="{{ $category->getUrl() }}">{{ $category->title }}</a></li>
                    @endforeach
                
                  </ul>
              </div>
              <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp"
                  data-wow-delay=".5s" style="visibility: hidden; animation-delay: 0.5s; animation-name: none;">
                  <h4 class="widget-title">Cài đặt ứng dụng</h4>
                  <p class=""> App Store or Google Play</p>
                  <div class="download-app">
                      <a href=""
                          class="hover-up mb-sm-2 mb-lg-0"><img class="active"
                              src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/app-store.jpg" alt=""></a>
                      <a href=""
                          class="hover-up mb-sm-2"><img
                              src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/google-play.jpg"
                              alt=""></a>
                  </div>
                  <p class="mb-20">Thanh toán</p>
                  <img class="" src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/payment-method.png"
                      alt="">
              </div>
          </div>
      </div>
  </section>
  <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0"
      style="visibility: hidden; animation-name: none;">
      <div class="row align-items-center">
          <div class="col-12 mb-30">
              <div class="footer-bottom"></div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6">
              <p class="font-sm mb-0">© 2024, <strong class="text-brand">{{ sc_store('title', ($storeId ?? null)) }}</strong>
                  <br>All rights reserved</p>
          </div>
          <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
              <div class="hotline d-lg-inline-flex mr-30">
                  <img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/phone-call.svg" alt="hotline">
                  <p>{{ sc_store('long_phone', ($storeId ?? null)) }}<span>Working 8:00 - 22:00</span></p>
              </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
              <div class="mobile-social-icon">
                  <h6>Follow Us</h6>
                  <a href="#"><img
                          src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-facebook-white.svg"
                          alt=""></a>
                  <a href="#"><img
                          src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-instagram-white.svg"
                          alt=""></a>
                  <a href="#"><img
                          src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-youtube-white.svg"
                          alt=""></a>
              </div>
              <p class="font-sm">Giảm giá tới 15% cho lần đăng ký đầu tiên của bạn</p>
          </div>
      </div>
  </div>
</footer>