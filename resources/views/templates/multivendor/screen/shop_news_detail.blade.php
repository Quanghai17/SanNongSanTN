@php
/*
$layout_page = shop_news_detail
**Variables:**
- $news: no paginate
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')
<main class="main" style="transform: none;">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ sc_route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a>
                <span></span> <a href="">Bài viết</a> <span></span> {{$news->title}}
            </div>
        </div>
    </div>
    <div class="page-content mb-50" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-xl-11 col-lg-12 m-auto" style="transform: none;">
                    <div class="row" style="transform: none;">
                        <div class="col-lg-9">
                            <div class="single-page pt-50 pr-30">
                                <div class="single-header style-2">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 m-auto">
                                            <h6 class="mb-10"><a href="#">Tiêu đề</a></h6>
                                            <h2 class="mb-10">{{$news->title}}</h2>
                                            
                                        </div>
                                    </div>
                                </div>
                                <figure class="single-thumbnail">
                                    <img src="{{ sc_file($news->getThumb()) }}" alt="">
                                </figure>
                                <div class="single-content">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 m-auto">
                                            <p>{!! sc_html_render($news->content) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 primary-sidebar sticky-sidebar pt-50" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                            
                        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 1332.44px;"><div class="widget-area">
                                <div class="sidebar-widget-2 widget_search mb-50">
                                    <div class="search-form">
                                        <form action="#">
                                            <input type="text" placeholder="Search…">
                                            <button type="submit"><i class="fi-rs-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="sidebar-widget widget-category-2 mb-50">
                                    <h5 class="section-title style-1 mb-30">Danh mục bài viết</h5>
                                    <ul>
                                        <li>
                                            <a href="{{ sc_route('news') }}"> <img src="assets/imgs/theme/icons/category-1.svg" alt="">Tin tức</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@push('styles')
{{-- Your css style --}}
@endpush

@push('scripts')
{{-- //script here --}}
@endpush
