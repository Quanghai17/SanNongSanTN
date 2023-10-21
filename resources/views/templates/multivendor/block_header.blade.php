<header class="header-area header-style-1 header-style-5 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><a href="about.html">Giới thiệu</a></li>
                            <li><a href="{{ sc_route('wishlist') }}">Yêu thích</a>
                            </li>
                            <li><a href="{{ sc_route('cart') }}">Đơn hàng</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">

                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>Số điện thoại: <strong class="text-brand"> {{ sc_store('long_phone', ($storeId ?? null)) }}</strong></li>
                            <li>Email: <strong class="text-brand"> {{ sc_store('email', ($storeId ?? null)) }}</strong></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ sc_route('home') }}" style="text-align: center;">
                        <img src="{{ sc_file(sc_store('logo', $storeId ?? null)) }}" alt="logo">
                        <h4 style="color: #0f5138;">Nông sản Thái Nguyên</h4>
                    </a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="{{ sc_route('search') }}"  method="GET">
                            <select class="select-active select2-hidden-accessible" data-select2-id="1" tabindex="-1"
                                aria-hidden="true">
                                <option data-select2-id="3">Tất cả sản phẩm</option>
                            </select>
                            <input type="text" name="keyword"  placeholder="Tìm kiếm từ khóa...">
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">

                            <div class="header-action-icon-2">
                                <a href="{{ sc_route('compare') }}">
                                    <img class="svgInject" alt="Nest"
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-compare.svg">
                                    <span class="pro-count blue">{{ Cart::instance('compare')->count() }}</span>
                                </a>
                                <a href="{{ sc_route('compare') }}"><span class="lable ml-0">So sánh</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="{{ sc_route('wishlist') }}">
                                    <img class="svgInject" alt="Nest"
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-heart.svg">
                                    <span class="pro-count blue">{{ Cart::instance('wishlist')->count() }}</span>
                                </a>
                                <a href="{{ sc_route('wishlist') }}"><span class="lable">Yêu thích</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{ sc_route('cart') }}">
                                    <img alt="Nest"
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-cart.svg">
                                    <span class="pro-count blue">{{ Cart::instance('default')->count() }}</span>
                                </a>
                                <a href="{{ sc_route('cart') }}"><span class="lable">Giỏ hàng</span></a>

                            </div>
                            <div class="header-action-icon-2">
                                <a href="https://wp.alithemes.com/html/nest/demo/page-account.html">
                                    <img class="svgInject" alt="Nest"
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-user.svg">
                                </a>
                                @if (sc_config('link_account', null, 1))
                                    @guest
                                        <a href=""><span
                                                class="lable ml-0">Tài khoản</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{ sc_route('login') }}"><i
                                                            class="fi fi-rs-user mr-10"></i>Đăng nhập</a>
                                                </li>
                                                <li>
                                                    <a href="{{ sc_route('register') }}"><i
                                                            class="fi fi-rs-user mr-10"></i>Đăng kí</a>
                                                </li>

                                            </ul>
                                        </div>
                                        {{-- <a class="btnx" href="{{ sc_route('login') }}">Đăng nhập</a>&nbsp;/
                                        <a href="{{ sc_route('register') }}">Đăng ký</a> --}}
                                    @else
                                        <a href=""><span
                                                class="lable ml-0">Tài khoản</span></a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="{{ sc_route('customer.index') }}"><i
                                                            class="fi fi-rs-user mr-10"></i>Thông tin</a>
                                                </li>
                                                <li>
                                                    <a href="{{ sc_route('logout') }}"><i
                                                            class="fi fi-rs-sign-out mr-10"></i>Đăng xuất</a>
                                                </li>
                                            </ul>
                                        </div>
                                        {{-- <a href="{{ sc_route('customer.index') }}">Tài Khoản</a>&nbsp;/
                                        <a href="{{ sc_route('logout') }}">Đăng xuất</a> --}}
                                    @endguest
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ sc_route('home') }}"><img src="{{ sc_file(sc_store('logo', $storeId ?? null)) }}"
                            alt="logo"></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active"
                            href="{{ sc_route('shop') }}">
                            <span class="fi-rs-apps"></span> <span class="et">Danh mục yêu thích</span>
                        </a>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li><a class="active" href="{{ sc_route('home') }}">Trang chủ</a></li>
                                <li><a href="about.html">Giới thiệu</a></li>
                                <li><a href="{{ sc_route('shop') }}">Sản phẩm</a></li>
                                <li><a href="{{ sc_route('MultiVendor.list') }}">Cửa hàng </a> </li>
                                <li><a href="{{ sc_route('news') }}">Tin tức</a></li>
                                <li><a href="{{ sc_route('contact') }}">Liên hệ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Nest" src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-heart.svg">
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="#">
                                <img alt="Nest" src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-cart.svg">
                                <span class="pro-count white">2</span>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ sc_route('home') }}"><img src="{{ sc_file(sc_store('logo', $storeId ?? null)) }}"
                        alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="https://wp.alithemes.com/html/nest/demo/index-5.html#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        @if (!empty($sc_layoutsUrl['menu']))
                            @foreach ($sc_layoutsUrl['menu'] as $url)
                                <li class="menu-item-has-children">
                                    <a class="" {{ $url->target == '_blank' ? 'target=_blank' : '' }}
                                        href="{{ sc_url_render($url->url) }}">{{ sc_language_render($url->name) }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="https://wp.alithemes.com/html/nest/demo/page-contact.html"><i class="fi-rs-marker"></i>
                        Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="https://wp.alithemes.com/html/nest/demo/page-login.html"><i class="fi-rs-user"></i>Log
                        In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="https://wp.alithemes.com/html/nest/demo/index-5.html#"><i
                            class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="https://wp.alithemes.com/html/nest/demo/index-5.html#"><img
                        src="./Nest - Multipurpose eCommerce HTML Template_files/icon-facebook-white.svg"
                        alt=""></a>
                <a href="https://wp.alithemes.com/html/nest/demo/index-5.html#"><img
                        src="./Nest - Multipurpose eCommerce HTML Template_files/icon-twitter-white.svg"
                        alt=""></a>
                <a href="https://wp.alithemes.com/html/nest/demo/index-5.html#"><img
                        src="./Nest - Multipurpose eCommerce HTML Template_files/icon-instagram-white.svg"
                        alt=""></a>
                <a href="https://wp.alithemes.com/html/nest/demo/index-5.html#"><img
                        src="./Nest - Multipurpose eCommerce HTML Template_files/icon-pinterest-white.svg"
                        alt=""></a>
                <a href="https://wp.alithemes.com/html/nest/demo/index-5.html#"><img
                        src="./Nest - Multipurpose eCommerce HTML Template_files/icon-youtube-white.svg"
                        alt=""></a>
            </div>
            <div class="site-copyright">Copyright 2022 © Nest. All rights reserved. Powered by AliThemes.</div>
        </div>
    </div>
</div>
<!--End header-->
