<div class="sc-new-price-wrap">
@switch($kind)
    @case(SC_PRODUCT_GROUP)
    <div class="sc-new-price">{!! sc_language_render('product.price_group') !!}</div>
        @break
    @default
        @if ($price == $priceFinal)
            <span class="sc-new-price">{!! sc_currency_render($price) !!}</span>
        @else
            <span class="old-price">{!!  sc_currency_render($price) !!}</span>
            <span class="sc-new-price">{!! sc_currency_render($priceFinal) !!}</span>
        @endif
@endswitch
</div>    