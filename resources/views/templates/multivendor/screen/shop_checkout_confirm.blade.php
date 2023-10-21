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
                    <span></span> Thanh toán
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Thanh toán</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-40">             
                    <div class="col-12">
                        <h5><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table box table-bordered">
                                <thead>
                                    <tr style="background: #eaebec">
                                        <th style="width: 50px;">No.</th>
                                        <th style="width: 100px;">{{ sc_language_render('product.sku') }}</th>
                                        <th>{{ sc_language_render('product.name') }}</th>
                                        <th>{{ sc_language_render('product.price') }}</th>
                                        <th>{{ sc_language_render('product.quantity') }}</th>
                                        <th>{{ sc_language_render('product.subtotal') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($cart as $item)
                                        @php
                                            $n = isset($n) ? $n : 0;
                                            $n++;
                                            $product = $modelProduct->start()->getDetail($item->id, null, $item->storeId);
                                        @endphp

                                        {{-- Render product in cart --}}
                                        <tr class="row_cart">
                                            <td>{{ $n }}</td>
                                            <td>{{ $product->sku }}</td>
                                            <td>
                                                {{ $product->name }}<br>
                                                {{-- Process attributes --}}
                                                @if ($item->options->count())
                                                    (@foreach ($item->options as $keyAtt => $att)
                                                        <b>{{ $attributesGroup[$keyAtt] }}</b>: {!! sc_render_option_price($att) !!}
                                                    @endforeach)
                                                    <br>
                                                @endif
                                                {{-- //end Process attributes --}}
                                                <a href="{{ $product->getUrl() }}"><img width="100"
                                                        src="{{ sc_file($product->getImage()) }}" alt=""></a>
                                            </td>
                                            <td>{!! $product->showPrice() !!}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td style="text-align: center">{{ sc_currency_render($item->subtotal) }}</td>
                                        </tr>
                                        {{-- // Render product in cart --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>              
                
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <h4 class="mb-30">Chi tiết giao hàng</h4>
                        <div class="col-12">
                            <form class="sc-shipping-address" id="form-order" role="form" method="POST"
                                action="{{ sc_route('order.add') }}">
                                {{-- Required csrf for secirity --}}
                                @csrf
                                {{-- // Required csrf for secirity --}}
                                <div class="row">
                                    {{-- Display address --}}
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <h3 class="control-label"><i class="fa fa-truck" aria-hidden="true"></i>
                                            {{ sc_language_render('cart.shipping_address') }}:<br></h3>
                                        <table class="table box table-bordered" id="showTotal">
                                            <tr>
                                                <th>{{ sc_language_render('order.name') }}:</td>
                                                <td>{{ $shippingAddress['first_name'] }}
                                                    {{ $shippingAddress['last_name'] }}</td>
                                            </tr>
                                            @if (sc_config('customer_name_kana'))
                                                <tr>
                                                    <th>{{ sc_language_render('order.name_kana') }}:</td>
                                                    <td>{{ $shippingAddress['first_name_kana'] . $shippingAddress['last_name_kana'] }}
                                                    </td>
                                                </tr>
                                            @endif
    
                                            @if (sc_config('customer_phone'))
                                                <tr>
                                                    <th>{{ sc_language_render('order.phone') }}:</td>
                                                    <td>{{ $shippingAddress['phone'] }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th>{{ sc_language_render('order.email') }}:</td>
                                                <td>{{ $shippingAddress['email'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ sc_language_render('order.address') }}:</td>
                                                <td>{{ $shippingAddress['address1'] . ' ' . $shippingAddress['address2'] . ' ' . $shippingAddress['address3'] . ',' . $shippingAddress['country'] }}
                                                </td>
                                            </tr>
                                            @if (sc_config('customer_postcode'))
                                                <tr>
                                                    <th>{{ sc_language_render('order.postcode') }}:</td>
                                                    <td>{{ $shippingAddress['postcode'] }}</td>
                                                </tr>
                                            @endif
    
                                            @if (sc_config('customer_company'))
                                                <tr>
                                                    <th>{{ sc_language_render('order.company') }}:</td>
                                                    <td>{{ $shippingAddress['company'] }}</td>
                                                </tr>
                                            @endif
    
                                            <tr>
                                                <th>{{ sc_language_render('cart.note') }}:</td>
                                                <td>{{ $shippingAddress['comment'] }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    {{-- // Display address --}}
    
                                    <div class="col-12 col-sm-12 col-md-6">
                                        {{-- Total --}}
                                        <h3 class="control-label"><br></h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table box table-bordered" id="showTotal">
                                                    @foreach ($dataTotal as $key => $element)
                                                        @if ($element['code'] == 'total')
                                                            <tr class="showTotal"
                                                                style="background:#f5f3f3;font-weight: bold;">
                                                                <th>{!! $element['title'] !!}</th>
                                                                <td style="text-align: right" id="{{ $element['code'] }}">
                                                                    {{ $element['text'] }}
                                                                </td>
                                                            </tr>
                                                        @elseif($element['value'] != 0)
                                                            <tr class="showTotal">
                                                                <th>{!! $element['title'] !!}</th>
                                                                <td style="text-align: right" id="{{ $element['code'] }}">
                                                                    {{ $element['text'] }}
                                                                </td>
                                                            </tr>
                                                        @elseif($element['code'] == 'shipping')
                                                            <tr class="showTotal">
                                                                <th>{!! $element['title'] !!}</th>
                                                                <td style="text-align: right" id="{{ $element['code'] }}">
                                                                    {{ $element['text'] }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </table>
    
                                                @if (!sc_config('payment_off'))
                                                    {{-- Payment method --}}
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <h3 class="control-label"><i class="fas fa-credit-card"></i>
                                                                    {{ sc_language_render('order.payment_method') }}:<br>
                                                                </h3>
                                                            </div>
                                                            <div class="form-group">
                                                                <div>
                                                                    <label class="radio-inline">
                                                                        <img title="{{ $paymentMethodData['title'] }}"
                                                                            alt="{{ $paymentMethodData['title'] }}"
                                                                            src="{{ sc_file($paymentMethodData['image']) }}"
                                                                            style="width: 120px;">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- //Payment method --}}
                                                @endif
    
                                            </div>
                                        </div>
                                        {{-- End total --}}
    
                                        {{-- Button process cart --}}
                                        <div class="row" style="padding-bottom: 20px;">
                                            <div class="col-md-12 text-center">
                                                <div class="pull-left">
                                                    <button class="button button-lg" type="button"
                                                        style="cursor: pointer;padding:10px 30px"
                                                        onClick="location.href='{{ sc_route('cart') }}'"><i
                                                            class="fa fa-arrow-left"></i>
                                                        {{ sc_language_render('cart.back_to_cart') }}</button>
                                                </div>
                                                <div class="pull-right" style="margin-top: 10px">
                                                    <button class="button button-lg button-secondary" id="submit-order"
                                                        type="submit" style="cursor: pointer;padding:10px 30px"><i
                                                            class="fa fa-check"></i>
                                                        {{ sc_language_render('cart.confirm') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- // Button process cart --}}
    
                                    </div>
                                </div>
                            </form>
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



@push('scripts')
    {{-- //script here --}}
@endpush

@push('styles')
    {{-- Your css style --}}
@endpush
