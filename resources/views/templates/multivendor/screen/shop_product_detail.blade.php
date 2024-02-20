@php
    /*
$layout_page = home
*/
    $banners = $modelBanner
        ->start()
        ->getBanner()
        ->getData();
    $products_new = $modelProduct
        ->start()
        ->getProductLatest()
        ->getData();

    $categories = $modelCategory
        ->start()
        ->setSort(['created_at', 'asc'])
        ->getData();

    $products_sale = $modelProduct
        ->start()
        ->getProductPromotion()
        ->getData();

    $news = $modelNews->start()->getData();
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
    <!-- Single Product-->
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ sc_route('home') }}" rel="nofollow"><i
                            class="fi-rs-home mr-5"></i>Trang chủ</a>
                    <span></span>{{ $product->name }}</a>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50 mt-30">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider slick-initialized slick-slider">
                                        <div class="slick-list draggable">
                                            <div class="slick-track" style="opacity: 1; width: 9675px;">
                                                <figure class="border-radius-10 slick-slide slick-cloned"
                                                    data-slick-index="-1" id="" aria-hidden="true"
                                                    style="width: 645px;" tabindex="-1">
                                                    <img src="{{ sc_file($product->getImage()) }}" alt="product image">
                                                </figure>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails slick-initialized slick-slider"><button
                                            type="button" class="slick-prev slick-arrow" style=""><i
                                                class="fi-rs-arrow-small-left"></i></button>
                                        <div class="slick-list draggable">
                                            <div class="slick-track" style="opacity: 1; width: 3006px;">
                                                <div class="slick-slide slick-cloned" data-slick-index="-4"
                                                    id="" aria-hidden="true" style="width: 147px;"
                                                    tabindex="-1"><img src="{{ sc_file($product->getImage()) }}"
                                                        alt="product image"></div>

                                            </div>
                                        </div>
                                        <button type="button" class="slick-next slick-arrow" style=""><i
                                                class="fi-rs-arrow-small-right"></i></button>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    @if ($product->price != $product->getFinalPrice() && $product->kind !=SC_PRODUCT_GROUP)
                                    <span class="stock-status out-stock"> Sale Off </span>
                                        @elseif($product->kind == SC_PRODUCT_BUILD)
                                        <span><img class="product-badge new" src="{{ sc_file($sc_templateFile.'/images/home/bundle.png') }}" class="new" alt="" /></span>
                                        @elseif($product->kind == SC_PRODUCT_GROUP)
                                        <span><img class="product-badge new" src="{{ sc_file($sc_templateFile.'/images/home/group.png') }}" class="new" alt="" /></span>
                                        @endif
                                   
                                    <h2 class="title-detail">{{ $product->name }}</h2>
                                    <div class="product-detail-rating">
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"></span>
                                        </div>
                                    </div>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand">{!! $product->showPriceDetail() !!}</span>

                                        </div>
                                    </div>
                                    <div class="short-desc mb-30">
                                        <p class="font-lg">{{ sc_language_render('product.description') }}:
                                            {{ $product->description }} </p>
                                    </div>
                                    <form id="buy_block" class="product-information"
                                        action="{{ sc_route('cart.add') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="product_id" id="product-detail-id"
                                            value="{{ $product->id }}" />
                                        <input type="hidden" name="storeId" id="product-detail-storeId"
                                            value="{{ $product->store_id }}" />
                                        <div class="detail-extralink mb-50">
                                            <div class="detail-qty border radius">
                                                <a class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <input type="text" name="qty" class="qty-val" value="1"
                                                    min="1">
                                                <a class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart"><i
                                                        class="fi-rs-shopping-cart"></i>Thêm vào giỏ hàng</button>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    onClick="addToCartAjax('{{ $product->id }}','wishlist','{{ $product->store_id }}')"><i
                                                        class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up"
                                                    onClick="addToCartAjax('{{ $product->id }}','compare','{{ $product->store_id }}')"><i
                                                        class="fi-rs-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="font-xs">
                                        <ul class="mr-50 float-start">
                                            <li class="mb-5">Danh mục: <span class="text-brand">
                                                    @foreach ($product->categories as $category)
                                                        <a href="{{ $category->getUrl() }}">{{ $category->getTitle() }}</a>,
                                                    @endforeach
                                                </span>
                                            </li>
                                            <li>
                                                @if (sc_config('product_stock'))
                                                    <div>
                                                        {{ sc_language_render('product.stock_status') }}:
                                                        <span id="stock_status">
                                                            @if ($product->stock <= 0 && !sc_config('product_buy_out_of_stock'))
                                                                {{ sc_language_render('product.out_stock') }}
                                                            @else
                                                                {{ sc_language_render('product.in_stock') }}
                                                            @endif
                                                        </span>
                                                    </div>
                                                @endif
                                            </li>
                                        </ul>
                                        <ul class="float-start">
                                            <li class="mb-5">SKU: <a>{{ $product->sku }}</a>
                                            </li>
                                            <li class="mb-5">Tags: <a
                                                    href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#"
                                                    rel="tag">Snack</a>, <a
                                                    href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#"
                                                    rel="tag">Organic</a>, <a
                                                    href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#"
                                                    rel="tag">Brown</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                            href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#Description">Mô
                                            tả chi tiết</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab"
                                            href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#Vendor-info">Cửa
                                            hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab"
                                            href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#Reviews">Đánh
                                            giá
                                            </a>
                                    </li>
                                </ul>
                               
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            <p> {!! sc_html_render($product->content) !!}</p>

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="Vendor-info">
                                      @php
                                          $productStore = $product->stores;
                                          // dd($productStore);
                                      @endphp
                                      @foreach($productStore as $item)
                                           
                                          {{-- <img class="hover-img" style="width: 50px"
                                          src="{{ sc_file($item->logo) }}"
                                          alt="">
                                          <p>{{$item->office}}</p> --}}
                                          <div class="vendor-logo d-flex mb-30">
                                            <img src="{{ sc_file($item->logo) }}" style="width:150px"
                                                alt="">
                                            <div class="vendor-name ml-15">
                                                <h4>
                                                    <a >{!! $product->displayVendor() !!}</a>
                                                </h4>
                                                
                                            </div>
                                        </div>
                                        <ul class="contact-infor mb-50">
                                            <li><img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-location.svg"
                                                    alt=""><strong>Địa chỉ: </strong> <span>{{$item->address}}</span></li>
                                            <li><img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-contact.svg"
                                                    alt=""><strong>Số điện thoại: </strong><span>{{$item->long_phone}}</span></li>
                                        </ul>
                                        
                                      @endforeach
                                        
                                        
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <!-- Render include view -->
                                        @include($sc_templatePath.'.common.include_view')
                                        {{-- @dd($points); --}}
                                        <!--// Render include view -->
                                        <!--Comments-->
                                        <div class="comments-area">
                                            <div class="row">
                                                {{-- <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer questions &amp; answers</h4>
                                                    <div class="comment-list">
                                                        <div
                                                            class="single-comment justify-content-between d-flex mb-30">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="./Nest - Multipurpose eCommerce HTML Template - ShopDetail_files/author-2.png"
                                                                        alt="">
                                                                    <a href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#"
                                                                        class="font-heading text-brand">Sienna</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">December
                                                                                4,
                                                                                2022 at 3:12 pm </span>
                                                                        </div>
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating"
                                                                                style="width: 100%"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit. Delectus, suscipit
                                                                        exercitationem accusantium obcaecati quos
                                                                        voluptate nesciunt facilis itaque modi commodi
                                                                        dignissimos sequi repudiandae minus ab deleniti
                                                                        totam officia id incidunt? <a
                                                                            href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#"
                                                                            class="reply">Reply</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="./Nest - Multipurpose eCommerce HTML Template - ShopDetail_files/author-3.png"
                                                                        alt="">
                                                                    <a href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#"
                                                                        class="font-heading text-brand">Brenna</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">December
                                                                                4,
                                                                                2022 at 3:12 pm </span>
                                                                        </div>
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating"
                                                                                style="width: 80%"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit. Delectus, suscipit
                                                                        exercitationem accusantium obcaecati quos
                                                                        voluptate nesciunt facilis itaque modi commodi
                                                                        dignissimos sequi repudiandae minus ab deleniti
                                                                        totam officia id incidunt? <a
                                                                            href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#"
                                                                            class="reply">Reply</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="./Nest - Multipurpose eCommerce HTML Template - ShopDetail_files/author-4.png"
                                                                        alt="">
                                                                    <a href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#"
                                                                        class="font-heading text-brand">Gemma</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">December
                                                                                4,
                                                                                2022 at 3:12 pm </span>
                                                                        </div>
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating"
                                                                                style="width: 80%"></div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mb-10">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit. Delectus, suscipit
                                                                        exercitationem accusantium obcaecati quos
                                                                        voluptate nesciunt facilis itaque modi commodi
                                                                        dignissimos sequi repudiandae minus ab deleniti
                                                                        totam officia id incidunt? <a
                                                                            href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#"
                                                                            class="reply">Reply</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-lg-4">
                                                    <h4 class="mb-30">Customer reviews</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width: 90%"></div>
                                                        </div>
                                                        <h6>4.8 out of 5</h6>
                                                    </div>
                                                    <div class="progress">
                                                        <span>5 star</span>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100">50%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 star</span>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100">25%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                                            aria-valuemax="100">45%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                                            aria-valuemax="100">65%
                                                        </div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 85%" aria-valuenow="85" aria-valuemin="0"
                                                            aria-valuemax="100">85%
                                                        </div>
                                                    </div>
                                                    <a href="https://wp.alithemes.com/html/nest/demo/shop-product-full.html#"
                                                        class="font-xs text-muted">How are ratings calculated?</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <!--comment form-->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h2 class="section-title style-1 mb-30">Sản phẩm tương tự</h2>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    @if ($productRelation->count())
                                        @foreach ($productRelation as $key => $productRel)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{ $productRel->getUrl() }}" tabindex="0">
                                                                <img class="default-img"
                                                                    src="{{ sc_file($productRel->image) }}"
                                                                    alt="">
                                                                <img class="hover-img"
                                                                    src="{{ sc_file($productRel->image) }}"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                        <div class="product-action-1">
                                                            <a aria-label="Add To Wishlist"
                                                                class="action-btn small hover-up"
                                                                onClick="addToCartAjax('{{ $product->id }}','wishlist','{{ $product->store_id }}')"
                                                                tabindex="0"><i class="fi-rs-heart"></i></a>
                                                            <a aria-label="Compare" class="action-btn small hover-up"
                                                                onClick="addToCartAjax('{{ $product->id }}','compare','{{ $product->store_id }}')"
                                                                tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href="{{ $productRel->getUrl() }}"
                                                                tabindex="0">{{ $productRel->getName() }}</a></h2>
                                                        <div class="rating-result" title="90%">
                                                            <span> </span>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>{!! $productRel->showPrice() !!} </span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
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
@endpush

@push('scripts')
    <!-- //script here -->
@endpush
