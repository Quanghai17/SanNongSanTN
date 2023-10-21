@php
    $productsNew = $modelProduct
        ->start()
        ->getProductLatest()
        ->setlimit(sc_config('product_top', $storeId))
        ->setStore($storeId)
        ->getData();
@endphp

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
    <main class="main" style="transform: none;">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ sc_route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a>
                    <span></span> Cửa hàng <span></span>{{$title}}
                </div>
            </div>
        </div>
        <div class="container mb-30" style="transform: none;">
            <div class="archive-header-2 text-center pt-80 pb-50" style="background-image: url('https://wp.alithemes.com/html/nest/demo/assets/imgs/blog/header-bg.png');margin: 20px;
            border-radius: 41px;">
                <h1 class="display-2 mb-50">{{$title}}</h1>
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        
                    </div>
                </div>
            </div>
            <div class="row flex-row-reverse" style="transform: none;">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>Sản phẩm trong gian hàng</p>
                        </div>  
                        
                    </div>
                    <div class="row product-grid">
                      @foreach ($productsNew as $key => $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                          <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ $product->getUrl() }}">
                                        <img class="default-img"
                                            src="{{ sc_file($product->image) }}"
                                            alt="">
                                        <img class="hover-img"
                                            src="{{ sc_file($product->image) }}"
                                            alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Thêm vào yêu thích" class="action-btn"
                                    onClick="addToCartAjax('{{ $product->id }}','wishlist','{{ $product->store_id }}')"><i
                                            class="fi-rs-heart"></i></a>
                                    <a aria-label="So sánh" class="action-btn"
                                    onClick="addToCartAjax('{{ $product->id }}','compare','{{ $product->store_id }}')"><i
                                            class="fi-rs-shuffle"></i></a>
                                    
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if ($product->price != $product->getFinalPrice() && $product->kind !=SC_PRODUCT_GROUP)
                                    <span class="sale">Sale</span>
                                    @elseif($product->kind == SC_PRODUCT_BUILD)
                                    <span><img class="product-badge new" src="{{ sc_file($sc_templateFile.'/images/home/bundle.png') }}" class="new" alt="" /></span>
                                    @elseif($product->kind == SC_PRODUCT_GROUP)
                                    <span><img class="product-badge new" src="{{ sc_file($sc_templateFile.'/images/home/group.png') }}" class="new" alt="" /></span>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="#">Sản phẩm</a>
                                </div>
                                <h2><a href="{{ $product->getUrl() }}">{{ $product->getName() }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                      
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                      {!! $product->showPrice() !!}
                                        
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" onClick="addToCartAjax('{{ $product->id }}','cart','{{ $product->store_id }}')"><i
                                            class="fi-rs-shopping-cart mr-5"></i>Thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--end product card-->
                      @endforeach
                    </div>
                    <!--product grid-->                  
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar"
                    style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">


                    <!-- Fillter By Price -->


                    <div class="theiaStickySidebar"
                        style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 158.5px;">
                        <div class="sidebar-widget widget-store-info mb-30 bg-3 border-0">
                            <div class="vendor-logo mb-30">
                                <img src="{{ sc_file($store->logo) }}" alt="">
                            </div>
                            <div class="vendor-info">
                                
                                <h4 class="mb-5"><a href="" class="text-heading">{{$title}}</a></h4>
                                <div class="product-rate-cover mb-15">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="vendor-des mb-30">
                                    <p class="font-sm text-heading">{{$description}}</p>
                                </div>
                                <div class="follow-social mb-20">
                                    <h6 class="mb-15">Theo dõi</h6>
                                    <ul class="social-network">
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/social-tw.svg" alt="">
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/social-fb.svg" alt="">
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/social-insta.svg" alt="">
                                            </a>
                                        </li>
                                        <li class="hover-up">
                                            <a href="#">
                                                <img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/social-pin.svg" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="vendor-info">
                                    <ul class="font-sm mb-20">
                                        <li><img class="mr-5" src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-location.svg"
                                                alt=""><strong>Địa chỉ: </strong> <span>{{$store->address}}</span></li>
                                        <li><img class="mr-5" src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-contact.svg"
                                                alt=""><strong>Số điện thoại:</strong><span>{{$store->phone}}</span></li>
                                    </ul>
                                    <a href="vendor-details-1.html" class="btn btn-xs">Liên hệ người bán <i
                                            class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget widget-category-2 mb-30">
                            <h5 class="section-title style-1 mb-30">Danh mục riêng</h5>
                            <ul>
                              @foreach (sc_vendor_get_categories_front($storeId) as $category)
                                <li>
                                    <a href="{{ $category->getUrl() }}"> <img
                                            src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/category-1.svg" alt="">{{ $category->title }}</a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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

@push('styles')
    {{-- Your css style --}}
@endpush

@push('scripts')
@endpush
