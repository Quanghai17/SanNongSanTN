{{-- review --}}
@php
    $points = (new App\Plugins\Cms\ProductReview\Models\PluginModel())->getPointProduct($product->id);
    $pathPlugin = (new App\Plugins\Cms\ProductReview\AppConfig())->pathPlugin;
@endphp
<section class="section section-sm bg-default">
    <div class="container" id="review">
        <div id="review-detail">
            @if ($points->count())
                @foreach ($points as $k => $point)
               
                    <div class="review-detail" style="margin-top: 15px">
                        <div class="r-name">
                            <h4><b>{{ $point->name }}</b></h4>

                            <span class="review-star">({{ date('d/m/Y', strtotime($point->created_at)) }}
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating"style="width: {{ ($point->point / 5) * 100 }}%">
                                    </div>
                                </div>)
                            </span>
                            @if (auth()->user() && $point->customer_id == auth()->user()->id)
                                <span style="background-color: rgb(255, 255, 255)"
                                    class="r-remove text-danger text-right btn" data-id="{{ $point->id }}"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i>Xóa</span>
                            @endif
                        </div>
                        <div class="r-comment"
                            style="font-size: 15px;
                        font-weight: 600;
                        color: #616161;
                        width: fit-content;
                        padding: 10px;
                        background-color: #dfefff;
                        border-radius: 5px;
                        margin-top: 5px">
                            {!! sc_html_render($point->comment) !!}</div>
                    </div>
                @endforeach
            @else
                <p> {{ trans($pathPlugin . '::lang.no_review') }}</p>
            @endif

        </div>
        <h2 class="title-review pt-50">{{ trans($pathPlugin . '::lang.write_review') }}</h2>
        <form class="form-contact comment_form" id="form-review" method="POST"
            action="{{ sc_route('product_review.postReview') }}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="form-group required">
                <div class="col-sm-12">
                    <label class="control-label" for="input-name">{{ trans($pathPlugin . '::lang.your_name') }}</label>
                    <input disabled type="text" style="width: fit-content;"
                        value="{{ auth()->user() ? auth()->user()->name : trans($pathPlugin . '::lang.guest') }}"
                        id="input-name" class="form-control">
                </div>
            </div>
            <div class="form-group required {{ $errors->has('comment') ? ' has-error' : '' }}">
                <div class="col-sm-12">
                    <label class="control-label"
                        for="input-review">{{ trans($pathPlugin . '::lang.your_review') }}</label>
                    <textarea {{ auth()->user() ? '' : 'disabled' }} name="comment" rows="15" id="input-review" style="height: 120px;"
                        class="form-control w-50">{!! old('comment') !!}</textarea>
                </div>
                @if ($errors->has('comment'))
                    <span class="help-block">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $errors->first('comment') }}
                    </span>
                @endif
            </div>
            <div class="form-group required {{ $errors->has('point') ? ' has-error' : '' }}">
                <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
                <div x-data="{ selectedPoint: '1' }" class="col-sm-12">
                    <ul style="display: flex;justify-content: space-around;width: 50%;">
                        <template x-for="point in [1, 2, 3, 4, 5]">
                            <li class="nav-item" @click="selectedPoint = point">
                                <img x-bind:src="selectedPoint >= point ?
                                    'http://localhost/s-cart-demo/public/templates/multivendor/imgs/icon/rating-stars-01.png' :
                                    'http://localhost/s-cart-demo/public/templates/multivendor/imgs/icon/rating-stars-02.png'"
                                    alt="">
                                <input type="radio" name="point" x-bind:value="point"
                                    x-on:click="selectedPoint = point" x-bind:checked="selectedPoint == point"
                                    style="display: none;">
                            </li>
                        </template>
                    </ul>
                </div>

                {{-- <div class="col-sm-12">
                    <ul style="display: flex;justify-content: space-around;">
                        <li class="nav-item">
                            <img src="{{ sc_file($sc_templateFile . '/imgs/icon/rating-stars-01.png') }}" alt="">
                        </li>

                        <li class="nav-item">
                            <img src="{{ sc_file($sc_templateFile . '/imgs/icon/rating-stars-01.png') }}" alt="">
                        </li>
                        <li class="nav-item">
                            <img src="{{ sc_file($sc_templateFile . '/imgs/icon/rating-stars-01.png') }}" alt="">
                        </li>
                        <li class="nav-item">
                            <img src="{{ sc_file($sc_templateFile . '/imgs/icon/rating-stars-01.png') }}" alt="">
                        </li>
                        <li class="nav-item">
                            <img src="{{ sc_file($sc_templateFile . '/imgs/icon/rating-stars-01.png') }}" alt="">
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul style="display: flex;justify-content: space-around;">
                        <li class="nav-item">
                            <img src="{{ sc_file($sc_templateFile . '/imgs/icon/rating-stars-02.png') }}" alt="">
                        </li>

                        <li class="nav-item">
                            <img src="{{ sc_file($sc_templateFile . '/imgs/icon/rating-stars-02.png') }}" alt="">
                        </li>
                        <li class="nav-item">
                            <img src="{{ sc_file($sc_templateFile . '/imgs/icon/rating-stars-02.png') }}" alt="">
                        </li>
                        <li class="nav-item">
                            <img src="{{ sc_file($sc_templateFile . '/imgs/icon/rating-stars-02.png') }}" alt="">
                        </li>
                        <li class="nav-item">
                            <img src="{{ sc_file($sc_templateFile . '/imgs/icon/rating-stars-02.png') }}" alt="">
                        </li>
                    </ul>
                </div> --}}
                @if ($errors->has('point'))
                    <span class="help-block">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> {{ $errors->first('point') }}
                    </span>
                @endif
            </div>
            @if (sc_captcha_method() &&
                    in_array('review', sc_captcha_page()) &&
                    view()->exists(sc_captcha_method()->pathPlugin . '::render'))
                @php
                    $titleButton = trans($pathPlugin . '::lang.submit');
                    $idForm = 'form-review';
                    $idButtonForm = 'button-review';
                @endphp
                @include(sc_captcha_method()->pathPlugin . '::render')
            @endif
            <div class="buttons clearfix">
                <div class="pull-right">
                    <button type="button" id="button-review" data-loading-text="Loading..."
                        class="btn btn-primary">{{ trans($pathPlugin . '::lang.submit') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
{{-- //end review --}}
