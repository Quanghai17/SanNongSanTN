@php
/*
$layout_page = home
*/ 
// $productsNew = $modelProduct
//         ->start()
//         ->getProductLatest()
//         ->setlimit(sc_config('product_top', $storeId))
//         ->setStore($storeId)
//         ->getData();
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

    $news = $modelNews ->start()->getData();
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
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700%7CLato%7CKalam:300,400,700">
  <link rel="canonical" href="{{ request()->url() }}" />
  <meta name="description" content="{{ $description??sc_store('description') }}">
  <meta name="keyword" content="{{ $keyword??sc_store('keyword') }}">
  <title>{{$title??sc_store('title')}}</title>
  <link rel="icon" href="{{ sc_file(sc_store('icon', null, 'images/icon.png')) }}" type="image/png" sizes="16x16">
  <meta property="og:image" content="{{ !empty($og_image)?sc_file($og_image):sc_file('images/org.jpg') }}" />
  <meta property="og:url" content="{{ \Request::fullUrl() }}" />
  <meta property="og:type" content="Website" />
  <meta property="og:title" content="{{ $title??sc_store('title') }}" />
  <meta property="og:description" content="{{ $description??sc_store('description') }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- css default for item s-cart -->
  @include($sc_templatePath.'.common.css')
  <!--//end css defaut -->

  <!--Module header -->
  @includeIf($sc_templatePath.'.common.render_block', ['positionBlock' => 'header'])
  <!--//Module header -->

  {{-- <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/fonts.css')}}">
  <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/style.css')}}"> --}}

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon"
      href="{{ sc_file(sc_store('logo', $storeId ?? null)) }} ">
  <!-- Template CSS -->
  <!-- Template CSS -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/plugins/animate.min.css')}}">
    <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/main.css?v=5.6')}}">
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
            @include($sc_templatePath.'.block_header')
      @show
    <!--End header-->
    <main class="main" style="transform: none;">
        <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header" style="background-image: url('https://wp.alithemes.com/html/nest/demo/assets/imgs/blog/header-bg.png')">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">Sản phẩm</h1>
                            <div class="breadcrumb">
                                <a href="{{ sc_route('home') }}" rel="nofollow"><i
                                        class="fi-rs-home mr-5"></i>Trang chủ</a>
                                <span></span> Cửa hàng <span></span> Sản phẩm
                            </div>
                        </div>
                        <div class="col-xl-9 text-end d-none d-xl-block">
                            <ul class="tags-list">
                              @foreach ($categories as $key => $category)
                                <li class="hover-up" style="padding: 10px">
                                    <a href="{{ $category->getUrl() }}"><i
                                            class="fi-rs-cross mr-10"></i>{{$category->title}}</a>
                                </li>
                              @endforeach
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
              
                        </div>
                        <div class="sort-by-product-area">
                            
                            @include($sc_templatePath.'.common.product_filter_sort', ['filterSort' => $filter_sort])
                        </div>
                    </div>
                    <div class="row product-grid">
                      @foreach ($products  as $product )
                      @php
                          $productStore = $product->stores;
                      @endphp
                      {{-- @dd($productStore ); --}}
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
                                    <div>
                                        @foreach($productStore as $item)
                                           
                                            <img class="hover-img" style="width: 50px"
                                            src="{{ sc_file($item->logo) }}"
                                            alt="">
                                            <p>{{$item->office}}</p>
                                        @endforeach
                                      @if (empty($hiddenStore)){!! $product->displayVendor() !!}@endif
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
                      @endforeach
                        <!--end product card-->
                      
                    </div>
                    <!--product grid-->
                    @include($sc_templatePath.'.common.pagination', ['items' => $products])
                    {{-- <section class="section-padding pb-5">
                        <div class="section-title">
                            <h3 class="">Deals Of The Day</h3>
                            <a class="show-all" href="https://wp.alithemes.com/html/nest/demo/shop-grid-right.html">
                                All Deals
                                <i class="fi-rs-angle-right"></i>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="https://wp.alithemes.com/html/nest/demo/shop-product-right.html">
                                                <img src="./Nest - Multipurpose eCommerce HTML Template - Shop_files/banner-5.png"
                                                    alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">525</span><span
                                                        class="countdown-period"> days </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">14</span><span
                                                        class="countdown-period"> hours </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">52</span><span
                                                        class="countdown-period"> mins </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">49</span><span
                                                        class="countdown-period"> sec </span></span></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a
                                                    href="https://wp.alithemes.com/html/nest/demo/shop-product-right.html">Seeds
                                                    of Change Organic Quinoa, Brown</a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a
                                                        href="https://wp.alithemes.com/html/nest/demo/vendor-details-1.html">NestFood</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$32.85</span>
                                                    <span class="old-price">$33.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add"
                                                        href="https://wp.alithemes.com/html/nest/demo/shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="https://wp.alithemes.com/html/nest/demo/shop-product-right.html">
                                                <img src="./Nest - Multipurpose eCommerce HTML Template - Shop_files/banner-6.png"
                                                    alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">921</span><span
                                                        class="countdown-period"> days </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">14</span><span
                                                        class="countdown-period"> hours </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">52</span><span
                                                        class="countdown-period"> mins </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">49</span><span
                                                        class="countdown-period"> sec </span></span></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a
                                                    href="https://wp.alithemes.com/html/nest/demo/shop-product-right.html">Perdue
                                                    Simply Smart Organics Gluten</a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a
                                                        href="https://wp.alithemes.com/html/nest/demo/vendor-details-1.html">Old
                                                        El Paso</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$24.85</span>
                                                    <span class="old-price">$26.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add"
                                                        href="https://wp.alithemes.com/html/nest/demo/shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="https://wp.alithemes.com/html/nest/demo/shop-product-right.html">
                                                <img src="./Nest - Multipurpose eCommerce HTML Template - Shop_files/banner-7.png"
                                                    alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">1255</span><span
                                                        class="countdown-period"> days </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">14</span><span
                                                        class="countdown-period"> hours </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">52</span><span
                                                        class="countdown-period"> mins </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">49</span><span
                                                        class="countdown-period"> sec </span></span></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a
                                                    href="https://wp.alithemes.com/html/nest/demo/shop-product-right.html">Signature
                                                    Wood-Fired Mushroom</a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (3.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a
                                                        href="https://wp.alithemes.com/html/nest/demo/vendor-details-1.html">Progresso</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$12.85</span>
                                                    <span class="old-price">$13.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add"
                                                        href="https://wp.alithemes.com/html/nest/demo/shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">
                                <div class="product-cart-wrap style-2">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img">
                                            <a href="https://wp.alithemes.com/html/nest/demo/shop-product-right.html">
                                                <img src="./Nest - Multipurpose eCommerce HTML Template - Shop_files/banner-8.png"
                                                    alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="deals-countdown-wrap">
                                            <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">497</span><span
                                                        class="countdown-period"> days </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">14</span><span
                                                        class="countdown-period"> hours </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">52</span><span
                                                        class="countdown-period"> mins </span></span><span
                                                    class="countdown-section"><span
                                                        class="countdown-amount hover-up">49</span><span
                                                        class="countdown-period"> sec </span></span></div>
                                        </div>
                                        <div class="deals-content">
                                            <h2><a
                                                    href="https://wp.alithemes.com/html/nest/demo/shop-product-right.html">Simply
                                                    Lemonade with Raspberry Juice</a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (3.0)</span>
                                            </div>
                                            <div>
                                                <span class="font-small text-muted">By <a
                                                        href="https://wp.alithemes.com/html/nest/demo/vendor-details-1.html">Yoplait</a></span>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span>$15.85</span>
                                                    <span class="old-price">$16.8</span>
                                                </div>
                                                <div class="add-cart">
                                                    <a class="add"
                                                        href="https://wp.alithemes.com/html/nest/demo/shop-cart.html"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> --}}
                    <!--End Deals-->
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar"
                    style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <!-- Fillter By Price -->
                    <!-- Product sidebar Widget -->
                    <div class="theiaStickySidebar"
                        style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 1446.5px;">
                        <div class="sidebar-widget widget-category-2 mb-30">
                            <h5 class="section-title style-1 mb-30">Danh mục sản phẩm</h5>
                            <ul>
                                
                              <li>
                                <a href="http://localhost/s-cart/public/category/do-uong-duoc-lieu.html"> <img
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/category-6.svg"
                                        alt="">Đồ uống dược liệu</a>
                            </li>

                            <li>
                                <a href="http://localhost/s-cart/public/category/rau-cu-qua.html"> <img
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/category-7.svg"
                                        alt="">Trái cây</a>
                            </li>
                            <li>
                                <a href="http://localhost/s-cart/public/category/rau-cu-qua.html"> <img
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/category-9.svg"
                                        alt="">Rau củ</a>
                            </li>
                            <li>
                                <a href="http://localhost/s-cart/public/category/che.html"> <img
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/category-5.svg"
                                        alt="">Chè</a>
                            </li>
                            <li>
                                <a href="http://localhost/s-cart/public/category/cay-duoc-lieu.html"> <img
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/category-10.svg"
                                        alt="">Cây dược liệu</a>
                            </li>
                            <li>
                                <a href="http://localhost/s-cart/public/category/thuy-hai-san.html"> <img
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-2.svg"
                                        alt="">Thủy hải sản</a>
                            </li>
                            <li>
                                <a href="http://localhost/s-cart/public/category/thit-gia-suc.html"> <img
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/category-4.svg"
                                        alt="">Thịt gia súc, gia cầm</a>
                            </li>
                            <li>
                                <a href="http://localhost/s-cart/public/category/san-pham-khac.html"> <img
                                        src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-4.svg"
                                        alt="">Sản phẩm khác</a>
                            </li>
                                
                            </ul>
                        </div>
                        {{-- @include($sc_templatePath.'.common.product_filter_price', ['filter_price' => $filter_sort]) --}}
                        <div class="sidebar-widget price_range range mb-30">
                            <h5 class="section-title style-1" style="margin-bottom: 5px">Lọc sản phẩm</h5>
                            <div class="list-group">
                                <div class="list-group-item mb-10 mt-10">
                                    <label class="fw-900">Giá sản phẩm</label>
                                    <form action="" method="GET" id="filter_sort">
                                        @php
                                        $queries = request()->except(['filter_sort','page']);
                                        // dd($queries);
                                        @endphp
                                        @foreach ($queries as $key => $query)
                                        <input type="hidden" name="{{ $key }}" value="{{ $query }}">
                                        @endforeach
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="filter_sort"
                                                id="exampleCheckbox1" value="">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>dưới 100.000đ</span></label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="filter_sort"
                                                id="exampleCheckbox2" value="">
                                            <label class="form-check-label" for="exampleCheckbox2"><span>từ 100.000đ đến 500.000đ</span></label>
                                            <br>
                                            <input class="form-check-input" type="checkbox" name="filter_sort"
                                                id="exampleCheckbox3" value="">
                                            <label class="form-check-label" for="exampleCheckbox3"><span>từ 500.000đ đến 1.000.000đ</span></label>
                                            <input class="form-check-input" type="checkbox" name="checkbox"
                                                id="exampleCheckbox3" value="">
                                            <label class="form-check-label" for="exampleCheckbox3"><span>trên 1.000.000đ</span></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <a href=""
                                class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Lọc</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include($sc_templatePath.'.block_footer')

    <!-- Vendor JS-->
    <script src="{{ sc_file($sc_templateFile.'/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/slick.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/waypoints.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/wow.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/select2.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/counterup.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/images-loaded.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/isotope.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/scrollup.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{ sc_file($sc_templateFile.'/js/main.js?v=5.6')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/shop.js?v=5.6')}}"></script>

    <div class="zoomContainer"
        style="-webkit-transform: translateZ(0);position:absolute;left:0px;top:0px;height:0px;width:0px;">
        <div class="zoomWindowContainer" style="width: 400px;">
            <div style="z-index: 999; overflow: hidden; margin-left: 0px; margin-top: 0px; background-position: 0px 0px; width: 0px; height: 0px; float: left; display: none; cursor: crosshair; background-repeat: no-repeat; position: absolute; background-image: url(&quot;assets/imgs/shop/product-16-2.jpg&quot;);"
                class="zoomWindow">&nbsp;</div>
        </div>
    </div>

     <!-- js default for item s-cart -->
     @include($sc_templatePath.'.common.js')
     <!--//end js defaut -->
     @stack('scripts')
</body>

</html>

@push('styles')
@endpush

@push('scripts')
<script type="text/javascript">
    $('[name="filter_sort"]').change(function(event) {
        $('#filter_sort').submit();
    });
  </script>
@endpush