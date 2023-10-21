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
                    <a href="{{ sc_route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a>
                    <span></span> Cửa hàng <span></span> So sánh sản phẩm
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    @if (count($compare) ==0)
                        <div class="col-md-12 text-danger min-height-37vh">
                            {{ sc_language_render('front.data_notfound') }}
                        </div>
                    @else
                    <h1 class="heading-2 mb-10">Danh sách sản phẩm</h1>
                    <div class="table-responsive">
                        <table class="table text-center table-compare">
                            <tbody>
                                <tr class="pr_image">
                                    @php
                                        $n = 0;
                                    @endphp
                                    <td class="text-muted font-sm fw-600 font-heading mw-200">Đánh giá</td>
                                    @foreach ($compare as $key => $item)
                                        @php
                                            $n++;
                                            $product = $modelProduct->start()->getDetail($item->id, null, $item->storeId);
                                        @endphp
                                        <td  class="row_img"><img style="height: 250px"
                                                src="{{ sc_file($product->getImage()) }}" alt="compare-img"></td>
                                    @endforeach
                                </tr>
                                <tr class="pr_title">
                                    <td class="text-muted font-sm fw-600 font-heading">Tên sản phẩm</td>
                                    @foreach ($compare as $key => $item)
                                        @php
                                            $n++;
                                            $product = $modelProduct->start()->getDetail($item->id, null, $item->storeId);
                                        @endphp
                                    <td class="product_name">
                                        <h6><a href="{{ $product->getUrl() }}" class="text-heading">{{ $product->name }}</a></h6>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr class="pr_price">
                                    <td class="text-muted font-sm fw-600 font-heading">Giá</td>
                                    @foreach ($compare as $key => $item)
                                        @php
                                            $n++;
                                            $product = $modelProduct->start()->getDetail($item->id, null, $item->storeId);
                                        @endphp
                                        <td class="product_price">
                                            <h4 class="price text-brand">{!! $product->showPrice() !!}</h4>
                                        </td>
                                    @endforeach
                                </tr>

                                <tr class="description">
                                    <td class="text-muted font-sm fw-600 font-heading">Mô tả</td>
                                    @foreach ($compare as $key => $item)
                                    @php
                                        $n++;
                                        $product = $modelProduct->start()->getDetail($item->id, null, $item->storeId);
                                    @endphp
                                        <td class="row_text font-xs">
                                            <p class="font-sm text-muted">{!! $product->description !!}
                                            </p>
                                        </td>
                                    @endforeach
                                    
                                </tr>
                                
                                <tr class="pr_remove text-muted">
                                    <td class="text-muted font-md fw-600"></td>
                                    @foreach ($compare as $key => $item)
                                    @php
                                        $n++;
                                        $product = $modelProduct->start()->getDetail($item->id, null, $item->storeId);
                                    @endphp
                                    <td class="row_remove">
                                        <a onClick="return confirm('Confirm')"  href="{{ sc_route("cart.remove",['id'=>$item->rowId, 'instance' => 'compare']) }}" class="text-muted"><i
                                                class="fi-rs-trash mr-5"></i><span>Xóa</span> </a>
                                    </td>
                                    @endforeach
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
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
