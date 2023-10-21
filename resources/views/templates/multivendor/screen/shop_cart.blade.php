<!DOCTYPE html>
<!-- saved from url=(0060)https://wp.alithemes.com/html/nest/demo/shop-grid-right.html -->
<html
    class="js sizes websockets customelements history postmessage webworkers picture pointerevents webanimations webgl srcset flexbox cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside"
    lang="en" style="transform: none;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700%7CLato%7CKalam:300,400,700">
    <link rel="canonical" href="{{ request()->url() }}" />
    <meta name="description" content="{{ $description ?? sc_store('description') }}">
    <meta name="keyword" content="{{ $keyword ?? sc_store('keyword') }}">
    <title>{{ $title ?? sc_store('title') }}</title>
    <link rel="icon" href="{{ sc_file(sc_store('icon', null, 'images/icon.png')) }}" type="image/png"
        sizes="16x16">
    <meta property="og:image" content="{{ !empty($og_image) ? sc_file($og_image) : sc_file('images/org.jpg') }}" />
    <meta property="og:url" content="{{ \Request::fullUrl() }}" />
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="{{ $title ?? sc_store('title') }}" />
    <meta property="og:description" content="{{ $description ?? sc_store('description') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- css default for item s-cart -->
    @include($sc_templatePath . '.common.css')
    <!--//end css defaut -->

    <!--Module header -->
    @includeIf($sc_templatePath . '.common.render_block', ['positionBlock' => 'header'])
    <!--//Module header -->

    {{-- <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/fonts.css')}}">
  <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/style.css')}}"> --}}

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ sc_file(sc_store('logo', $storeId ?? null)) }} ">
    <!-- Template CSS -->
    <!-- Template CSS -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ sc_file($sc_templateFile . '/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ sc_file($sc_templateFile . '/css/main.css?v=5.6') }}">
    <style id="theia-sticky-sidebar-stylesheet-TSS">
        .theiaStickySidebar:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body style="transform: none; overflow: visible;">
    <div class="body-overlay-1"></div>

    @section('block_header')
        @include($sc_templatePath . '.block_header')
    @show
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ sc_route('home') }}" rel="nofollow"><i
                            class="fi-rs-home mr-5"></i>Trang chủ</a>
                    <span></span> Giỏ hàng
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            @if (count($cart) ==0)
                <div class="col-md-12">
                    {!! sc_language_render('cart.cart_empty') !!}!
                </div>
            @else
                @php
                    $cartTmp = $cart->groupBy('storeId');
                @endphp
                <div class="row">
                    <div class="col-lg-8 mb-40">
                        <h1 class="heading-2 mb-10">Giỏ hàng của bạn</h1>
                    </div>
                </div>

                @foreach ($cartTmp as $sId => $cartItem)
                <div class="col-md-12 " >
                    <h5><i class="fa fa-shopping-bag" aria-hidden="true"></i>  {{ sc_store('title', $sId) }}</h5>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ sc_route('checkout.prepare') }}" method="POST">
                            <input type="hidden" name="store_id" value="{{ $sId }}">
                            @csrf
                            @include($sc_templatePath.'.common.cart_list', ['cartItem' => $cartItem])
                            <div class="divider-2 mb-30"></div>
                            <div class="cart-action d-flex justify-content-between">
                                <a class="btn" href="{{ sc_route('home') }}"><i class="fi-rs-arrow-left mr-10"></i>Tiếp tục mua hàng</a>
                                {{-- <a type="submit" class="btn  mr-10 mb-sm-15"><i class="fi-rs-arrow-right mr-10"></i>Thanh toán</a> --}}
                                <button type="submit"><i class="fi-rs-arrow-right mr-10"></i>Thanh toán</button>
                            </div>
                        </form> 
                    </div>
                
                </div>
                @endforeach
            @endif
        </div>
    </main>
    @include($sc_templatePath . '.block_footer')

    <!-- Vendor JS-->
    <script src="{{ sc_file($sc_templateFile . '/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/slick.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/waypoints.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/wow.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/select2.min.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/counterup.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/isotope.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/scrollup.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ sc_file($sc_templateFile . '/js/main.js?v=5.6') }}"></script>
    <script src="{{ sc_file($sc_templateFile . '/js/shop.js?v=5.6') }}"></script>

    <div class="zoomContainer"
        style="-webkit-transform: translateZ(0);position:absolute;left:0px;top:0px;height:0px;width:0px;">
        <div class="zoomWindowContainer" style="width: 400px;">
            <div style="z-index: 999; overflow: hidden; margin-left: 0px; margin-top: 0px; background-position: 0px 0px; width: 0px; height: 0px; float: left; display: none; cursor: crosshair; background-repeat: no-repeat; position: absolute; background-image: url(&quot;assets/imgs/shop/product-16-2.jpg&quot;);"
                class="zoomWindow">&nbsp;</div>
        </div>
    </div>

    <!-- js default for item s-cart -->
    @include($sc_templatePath . '.common.js')
    <!--//end js defaut -->
    @stack('scripts')
</body>

</html>



@push('scripts')
    {{-- //script here --}}
@endpush

@push('styles')
    {{-- Your css style --}}
@endpush
