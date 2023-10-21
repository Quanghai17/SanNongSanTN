@php
    /*
$layout_page = home
*/  
    $stores = \App\Plugins\Other\MultiVendor\Models\PluginModel::getStoreListHome();
    // dd($stores);
    $categories = $modelCategory
        ->start()
        ->setSort(['created_at', 'asc'])
        ->getData();
    //  dd($categories);
    $news = $modelNews 
        ->start()
        ->setSort(['created_at', 'desc'])
        ->setLimit(3)
        ->getData();
    //  dd($news);
    $categoryBlogs = $modelCmsCategory
        ->start()
        ->getData();
    //  dd($categoryBlogs);
    $blogs1 = $modelCmsContent
        ->start()
        ->setSort(['created_at', 'asc'])
        ->getContentToCategory('9a674cfe-3178-4f84-8f86-3dcc39044f6d')
        ->setLimit(3)
        ->getData();
    //  dd($blogs);
    $blog2 = $modelCmsContent
        ->start()
        ->setSort(['created_at', 'asc'])
        ->getContentToCategory('9a674ced-85a0-44d2-a51e-0eb36ec47d4e')
        ->setLimit(3)
        ->getData();
    //  dd($blogs);
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
    // dd($products_new );
    $products_hot = $modelProduct
        ->start()
        ->getProductLatest()
        ->setLimit(4)
        ->getData();
        
    if (function_exists('sc_product_flash')) {
    $productFlashSale = sc_product_flash(4);
    } else {
    $productFlashSale = [];
    }
@endphp

@extends($sc_templatePath . '.layout')

@section('block_main')
    <main class="main">
        <section class="home-slider position-relative mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 d-none d-lg-flex" style="height: max-content;">
                        <div class="categories-dropdown-wrap style-2 font-heading mt-30">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    <li>
                                        <a href="http://localhost/s-cart/public/category/do-uong-duoc-lieu.html"> <img
                                                src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/category-6.svg"
                                                alt="">Đồ uống dược liệu</a>
                                    </li>

                                    <li>
                                        <a href="http://localhost/s-cart/public/category/trai-cay.html"> <img
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
                                        <a href="http://localhost/s-cart/public/category/san-pham-ocop.html"> <img
                                                src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-4.svg"
                                                alt="">Sản phẩm OCOP</a>
                                    </li>
                                    <li>
                                        <a href="http://localhost/s-cart/public/category/san-pham-khac.html"> <img
                                                src="https://wp.alithemes.com/html/nest/demo/assets/imgs/theme/icons/icon-4.svg"
                                                alt="">Sản phẩm khác</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="home-slide-cover mt-30">
                            @foreach ($banners as $banner)
                                <div
                                    class="hero-slider-1 style-5 dot-style-1 dot-style-1-position-2 slick-initialized slick-slider slick-dotted">
                                    <div class="slick-list draggable">
                                        <div class="slick-track" style="opacity: 1; width: 1832px;">
                                            <div class="single-hero-slider single-animation-wrap slick-slide slick-current slick-active"
                                                style="background-image: url('{{ sc_file($banner->image) }}'); width: 916px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                                                data-slick-index="0" aria-hidden="false" tabindex="0" role="tabpanel"
                                                id="slick-slide00" aria-describedby="slick-slide-control00">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="banner-img style-4 mt-30">
                                    <img src="https://cms.thainguyen.vn/documents/130230/12411398/Anh+8.jpg/d4f6fd53-f3fd-4c5c-8bce-95d5d998db74?t=1691758509646"
                                        alt="">
                                    
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="banner-img style-5 mt-5 mt-md-30">
                                    <img src="https://cms.thainguyen.vn/documents/130230/12411398/Anh+9.jpg/76c660f2-d4aa-4bdf-9116-f7935f91c9e0?t=1691758509804"
                                        alt="">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End hero slider-->
        <section class="popular-categories section-padding">
            <div class="container wow animate__animated animate__fadeIn">
                <div class="section-title">
                    <div class="title">
                        <h3>Danh mục sản phẩm</h3>
                    </div>
                    <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                        id="carausel-10-columns-arrows"></div>
                </div>
                <div class="carausel-10-columns-cover position-relative">
                    <div class="carausel-10-columns" id="carausel-10-columns"
                        style="display: flex; justify-content: space-around;">

                        @foreach ($categories as $category)
                            <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                <figure class="img-hover-scale overflow-hidden">
                                    <a href="{{ $category->getUrl() }}"><img style="max-width: 130px;"
                                            src="{{ sc_file($category->image) }}" alt="" /></a>
                                </figure>
                                <h6><a href="{{ $category->title }}">{{ $category->title }}</a></h6>
                                <span></span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!--End category slider-->
        <section class="banners mb-25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0"
                            style="visibility: hidden; animation-name: none;">
                            <img src="{{ sc_file($sc_templateFile.'/imgs/banner5.jpg')}}" style="height: 300px"
                                alt="">
                            <div class="banner-text">
                                <h4>
                                    Chính sách Thanh toán & Bảo mật
                                </h4>
                                <a href="{{ sc_route('shop') }}"
                                    class="btn btn-xs">Xem ngay<i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s"
                            style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                            <img src="{{ sc_file($sc_templateFile.'/imgs/banner6.jpg')}}" style="height: 300px"
                                alt="">
                            <div class="banner-text">
                                <h4>
                                    Chính sách Giao hàng và Đổi trả
                                </h4>
                                <a href="{{ sc_route('shop') }}"
                                    class="btn btn-xs">Xem ngay<i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s"
                            style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                            <img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/banner/banner-3.png"
                                alt="">
                            <div class="banner-text">
                                <h4>Chính sách Bảo mật thông tin cá nhân</h4>
                                <a href="{{ sc_route('shop') }}"
                                    class="btn btn-xs">Xem ngay<i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End banners-->
        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn"
                    style="visibility: hidden; animation-name: none;">
                    <h3>Sản phẩm nổi bật</h3>
                    <ul class="nav nav-tabs links" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                aria-selected="true">Tất cả</button>
                        </li>
                        @foreach ($categories as $category)
                        
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#{{ $category->alias }}"
                                    type="button" role="tab" aria-controls="tab-two"
                                    aria-selected="false">{{ $category->title }}</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach ($products_new as $product)
                                {{-- @dd($product); --}}
                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                                        data-wow-delay=".1s"
                                        style="visibility: hidden; animation-delay: 0.1s; animation-name: none;">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ $product->getUrl() }}">
                                                    <img class="default-img" src="{{ sc_file($product->image) }}"
                                                        alt="">
                                                    <img class="hover-img" src="{{ sc_file($product->image) }}"
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
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a
                                                    href="https://wp.alithemes.com/html/nest/demo/shop-grid-right.html">Sản phẩm mới</a>
                                            </div>
                                            <h2><a href="{{ $product->getUrl() }}">{{ $product->getName() }}</a></h2>
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                                            </div>
                                            <div>
                                                <a href="">
                                                    @if (empty($hiddenStore))
                                                        {!! $product->displayVendor() !!}
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="product-card-bottom">
                                                <div class="product-price">
                                                    <span> {!! $product->showPrice() !!}</span>

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
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one-->
                   
                </div>
                <!--End tab-content-->
            </div>
        </section>
        <!--Products Tabs-->
        <section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0"
                            style="visibility: hidden; animation-name: none;">
                            <img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/banner/banner-16.png"
                                alt="">
                            <div class="banner-text">
                                <h6 class="mb-10 mt-30">Sản phẩm tươi sạch</h6>
                                <p>Xem sản phẩm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s"
                            style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                            <img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/banner/banner-17.png"
                                alt="">
                            <div class="banner-text">
                                <h6 class="mb-10 mt-30">100% tự nhiên</h6>
                                <p>Xem sản phẩm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s"
                            style="visibility: hidden; animation-delay: 0.4s; animation-name: none;">
                            <img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/banner/banner-18.png"
                                alt="">
                            <div class="banner-text">
                                <h6 class="mb-10 mt-30">Giảm giá vào cuối tháng</h6>
                                <p>Xem sản phẩm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.6s"
                            style="visibility: hidden; animation-delay: 0.6s; animation-name: none;">
                            <img src="https://wp.alithemes.com/html/nest/demo/assets/imgs/banner/banner-19.png"
                                alt="">
                            <div class="banner-text">
                                <h6 class="mb-10 mt-30">
                                    Liên hệ để nhận tư vấn
                                </h6>
                                <p>Xem sản phẩm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 banners-->
        <section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn"
                    style="visibility: hidden; animation-name: none;">
                    <h3 class="">Sản phẩm bán chạy</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn"
                        style="visibility: hidden; animation-name: none;">
                        <div class="banner-img style-2">
                            <div class="banner-text">
                                <h2 class="mb-100">Sản phẩm an toàn thực phẩm</h2>
                                <a href="{{ sc_route('shop') }}"
                                    class="btn btn-xs">Mua ngay <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel"
                                aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                        id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns" style="display: flex">
                                        @foreach ($products_hot as $product)
                                        
                                        @php
                                            $productStore = $product->stores;
                                        @endphp

                                        <div class="product-cart-wrap">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ $product->getUrl() }}">
                                                        <img class="default-img" src="{{ sc_file($product->image) }}" style="width:226px"
                                                            alt="" />
                                                        <img class="hover-img" src="{{ sc_file($product->image) }}" style="width:226px"
                                                            alt="" />
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
                                                    <span class="hot">Save 15%</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <span class="hot">đang giảm giá</span>
                                                <h2><a href="{{ $product->getUrl() }}">{{ $product->getName() }}</a></h2>
                                                {{-- <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: 80%"></div>
                                                </div> --}}
                                                @foreach($productStore as $item)
                                                    <img class="hover-img" style="width: 50px"
                                                    src="{{ sc_file($item->logo) }}"
                                                    alt="">
                                                    <p>{{$item->office}}</p>
                                                @endforeach
                                                <div class="product-price mt-10">
                                                    <span> {!! $product->showPrice() !!}</span>
                                                </div>
                                                
                                                <div class="add-cart">
                                                    <a class="add" onClick="addToCartAjax('{{ $product->id }}','cart','{{ $product->store_id }}')"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--End tab-pane-->
                        </div>
                        <!--End tab-content-->
                    </div>
                    <!--End Col-lg-9-->

                </div>
            </div>
        </section>
        <!--End Best Sales-->

        @if (count($productFlashSale))
        <section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__ animate__fadeIn animated" data-wow-delay="0" style="visibility: visible; animation-name: fadeIn;">
                    <h3 class="">Sản phẩm giảm giá</h3>
                    <a class="show-all" href="{{ sc_route('flash-sale') }}  ">
                        Xem tất cả
                        <i class="fi-rs-angle-right"></i>
                    </a>
                </div>
                <div class="row">
                    @foreach ($productFlashSale as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="product-cart-wrap style-2 wow animate__ animate__fadeInUp animated" data-wow-delay="0" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="{{ $product->getUrl() }}">
                                        <img src="{{ sc_file($product->getThumb()) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="deals-countdown-wrap">
                                    {{-- <div class="deals-countdown" data-countdown="{{ $product->promotionPrice->date_end }}"><span class="countdown-section"><span class="countdown-amount hover-up">521</span><span class="countdown-period"> days </span></span><span class="countdown-section"><span class="countdown-amount hover-up">15</span><span class="countdown-period"> hours </span></span><span class="countdown-section"><span class="countdown-amount hover-up">57</span><span class="countdown-period"> mins </span></span><span class="countdown-section"><span class="countdown-amount hover-up">08</span><span class="countdown-period"> sec </span></span></div> --}}
                                    <div class="countdown_time" style="display: flex;justify-content: space-around;" data-time="{{ $product->promotionPrice->date_end }}"></div>
                                </div>
                                <div class="deals-content">
                                    <h2><a href="{{ $product->getUrl() }}">{{ $product->getName() }}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted"> <a>@if (empty($hiddenStore))
                                            {!! $product->displayVendor() !!}
                                        @endif</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>{!! $product->showPrice() !!}</span>
                                        
                                        </div>
                                        
                                        <div class="add-cart">
                                            <a class="add" onClick="addToCartAjax('{{ $product->id }}','cart','{{ $product->store_id }}')"><i class="fi-rs-shopping-cart mr-5"></i>Thêm </a>
                                        </div>
                                        {{-- <div class="deal_progress">
                                            <span class="stock-sold">{{ sc_language_render('front.flash_sold') }}: <strong>{{ $product->pf_sold }}</strong></span>
                                            <span class="stock-available">{{ sc_language_render('front.flash_stock') }}: <strong>{{ $product->pf_stock }}</strong></span>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ round($product->pf_sold/$product->pf_stock*100) }}"
                                                 aria-valuemin="0" aria-valuemax="100" style="width:{{ round($product->pf_sold/$product->pf_stock*100) }}%"> {{ round($product->pf_sold/$product->pf_stock*100) }}% </div>
                                            </div>
                                        </div> --}}
                                        
                                    </div>
                                    <div class="sold mt-15 mb-15">
                                        <div class="progress mb-5">
                                            <div class="progress-bar" role="progressbar" style="width: {{ round($product->pf_sold/$product->pf_stock*100) }}%"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="font-xs text-heading"> Sold: {{ $product->pf_sold }}/{{ $product->pf_stock }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        
        <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0" style="visibility: hidden; animation-name: none;">
                        <h4 class="section-title style-1 mb-30 animated animated">Tin tức</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($news as $blog)
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ $blog->getUrl() }}"><img
                                            src="{{ sc_file($blog->getThumb()) }}"
                                            alt=""></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ $blog->getUrl() }}">{{ $blog->title }}</a>
                                    </h6>
                                    <p style=" display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                    -webkit-box-orient: vertical;  
                                    overflow: hidden;">{{ $blog->description }}</p>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp"
                        data-wow-delay=".1s" style="visibility: hidden; animation-delay: 0.1s; animation-name: none;">
                        <h4 class="section-title style-1 mb-30 animated animated">Cơ sở sản xuất kinh doanh</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($stores as $store)
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{route('MultiVendor.detail', $store->code)}}"><img
                                                src="{{ sc_file($store->logo) }}"
                                                alt=""></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{route('MultiVendor.detail', $store->code)}}">{{$store->office}}</a>
                                        </h6>
                                        <p>{{$store->address}}</p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp"
                        data-wow-delay=".2s" style="visibility: hidden; animation-delay: 0.2s; animation-name: none;">
                        <h4 class="section-title style-1 mb-30 animated animated">kết nối cung cầu</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($blog2 as $blog)
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ $blog->getUrl() }}"><img style="height: 70px; width:100px"
                                                src="{{ sc_file($blog->getThumb()) }}"
                                                alt=""></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{ $blog->getUrl() }}">{{ $blog->title }}</a>
                                        </h6>
                                        <p style=" display: -webkit-box;
                                        -webkit-line-clamp: 2;
                                        -webkit-box-orient: vertical;  
                                        overflow: hidden;">{{ $blog->description }}</p>
                                    </div>
                                </article>
                            @endforeach
                          
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp"
                        data-wow-delay=".3s" style="visibility: hidden; animation-delay: 0.3s; animation-name: none;">
                        <h4 class="section-title style-1 mb-30 animated animated">Cơ quan quản lý</h4>
                        <div class="product-list-small animated animated">
                            @foreach ($blogs1 as $blog)
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ $blog->getUrl() }}"><img
                                                src="{{ sc_file($blog->getThumb()) }}"
                                                alt=""></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="{{ $blog->getUrl() }}">{{ $blog->title }}</a>
                                        </h6>
                                        <p style=" display: -webkit-box;
                                        -webkit-line-clamp: 2;
                                        -webkit-box-orient: vertical;  
                                        overflow: hidden;">{{ $blog->description }}</p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 columns-->
    </main>
@endsection

@push('styles')
{{-- Your css style --}}
<style>
    .deal_wrap {
    border: 2px solid #FF324D;
    border-radius: 20px;
    overflow: hidden;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    margin-bottom: 25px;
    }
    .deal_wrap .product_img {
    max-width: 200px;
    width: 100%;
    }
    .deal_wrap .deal_content {
    width: 100%;
    padding: 30px 30px 30px 0;
    }
    .deal_wrap .deal_content .product_info {
    padding: 0;
    }
    
    .deal_wrap .countdown_box_cus {
    float: left;
    width: 25%;
    padding: 5px;
    }
    .deal_wrap .countdown_box_cus .countdown-wrap-cus {
    background: #dad6d6;
    }
    .deal_wrap .countdown_box_cus .countdown-cus {
    font-size: 24px;
    display: block;
    }
    .deal_wrap .countdown_time .cd_text {
    font-size: 13px;
    display: block;
    }
    .deal_wrap .deal_content .deal_progress {
    padding-top: 5px;
    display: block;
    }
    .deal_wrap .deal_content .deal_progress .stock-available {
    float: right;
    }
    .deal_wrap .deal_content .deal_progress .progress {
    margin-top: 5px;
    margin-bottom: 20px;
    border-radius: 20px;
    }
    .deal_progress .progress-bar {
    background-color: #FF324D;
    text-indent: -99999px;
    }
    
    </style>
@endpush

@push('scripts')
{{-- //script here --}}


<!-- END SECTION SHOP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
$('.countdown_time').each(function() {
    var endTime = $(this).data('time');
    $(this).countdown(endTime, function(tm) {
        let html = '<div class="countdown_box_cus" style="background-color: #ffffff;padding: 5px;border-radius: 4px; "><div class="countdown-wrap-cus" ><span class="countdown-cus days">%D </span><span class="cd_text">Ngày</span></div></div><div class="countdown_box_cus" style="background-color: #ffffff;padding: 5px;border-radius: 4px; "><div class="countdown-wrap-cus"><span class="countdown-cus hours">%H</span><span class="cd_text">Giờ</span></div></div><div class="countdown_box_cus" style="background-color: #ffffff;padding: 5px;border-radius: 4px; "><div class="countdown-wrap-cus"><span class="countdown-cus minutes">%M</span><span class="cd_text">Phút</span></div></div><div class="countdown_box_cus" style="background-color: #ffffff;padding: 5px;border-radius: 4px; "><div class="countdown-wrap-cus"><span class="countdown-cus seconds">%S</span><span class="cd_text">Giây</span></div></div>';
        $(this).html(tm.strftime(html));
    });
});
</script>
@endpush
