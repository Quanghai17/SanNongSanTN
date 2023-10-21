<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ app()->getLocale() }}">
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
    <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/plugins/slider-range.css')}}" />
    <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/plugins/animate.min.css')}}" />
    <link rel="stylesheet" href="{{ sc_file($sc_templateFile.'/css/main.css?v=5.6')}}" />

    <style>
        {!! sc_store_css() !!}
    </style>
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    @stack('styles')
  </head>
<body  style="overflow: visible;">
        {{-- Block header --}}
        @section('block_header')
            @include($sc_templatePath.'.block_header')
        @show
        {{--// Block header --}}

        {{-- Block main --}}
        @section('block_main')
            <section class="section section-xxl bg-default text-md-left">
                <div class="container">
                    <div class="row row-50">
                        @section('block_main_content')

                        @if (empty($hiddenBlockLeft))
                            

                            <!--Block center-->
                            <div class="col-lg-12 col-xl-12s">
                                @section('block_main_content_center')
                                    @include($sc_templatePath.'.block_main_content_center')
                                @show
                            </div>
                            <!--//Block center-->
                        @else
                            <!--Block center-->
                            @section('block_main_content_center')
                                @include($sc_templatePath.'.block_main_content_center')
                            @show
                            <!--//Block center-->
                        @endif

                        @if (empty($hiddenBlockRight))
                            <!--Block right -->
                            @section('block_main_content_right')
                                @include($sc_templatePath.'.block_main_content_right')
                            @show
                            <!--//Block right -->
                        @endif

                        @show
                    </div>
                </div>
            </section>
        @show
        {{-- //Block main --}}

        <!-- Render include view -->
        @include($sc_templatePath.'.common.include_view')
        <!--// Render include view -->


        {{-- Block bottom --}}
        @section('block_bottom')
            @include($sc_templatePath.'.block_bottom')
        @show
        {{-- //Block bottom --}}

        {{-- Block footer --}}
        @section('block_footer')
            @include($sc_templatePath.'.block_footer')
        @show
        {{-- //Block footer --}}


    {{-- <script src="{{ sc_file($sc_templateFile.'/js/core.min.js')}}"></script>
    <script src="{{ sc_file($sc_templateFile.'/js/script.js')}}"></script> --}}

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