<form action="" method="GET" id="filter_price">
    @php
    $queries = request()->except(['filter_price','page']);
    @endphp
    @foreach ($queries as $key => $query)
    <input type="hidden" name="{{ $key }}" value="{{ $query }}">
    @endforeach
    
    <div class="accordion-collapse pl-filterBox">
        <div class=card>
            <div class=card-header id=cardHeaderPriceRange>
                <h5><a href=#collapsePricerange aria-controls=collapsePricerange
                        data-toggle=collapse aria-expanded=true class=collapsed> Chọn mức giá <i
                            class="fa fa-angle-down"></i> </a></h5>
            </div>
            <div class="collapse show" id=collapsePricerange aria-labelledby=cardHeaderPriceRange>
                <div class=card-body>
                    <ul class="list-unstyled">
                        <li>
                            <input type="radio" name="filter_price" id="" value="5">
                            <label for="">Dưới 5 triệu</label>
                        </li>
                        <li>
                            <input type="radio" name="filter_price" id="" value="5-10">
                            <label for=""> Từ 5 - 10 triệu</label>
                        </li>
                        <li>
                            <input type="radio" name="filter_price" id="" value="10-15">
                            <label for="">Từ 10 - 15 triệu</label>
                        </li>
                        <li>
                            <input type="radio" name="filter_price" id="" value="15-20">
                            <label for="">Từ 15 - 20 triệu</label>
                        </li>
                        <li>
                            <input type="radio" name="filter_price" id="" value="20-30">
                            <label for="">Từ 20 - 30 triệu </label>
                        </li>
                        <li>
                            <input type="radio" name="filter_price" id="" value="30-50">
                            <label for="">Từ 30 - 50 triệu</label>
                        </li>
                        <li>
                            <input type="radio" name="filter_price" id="" value="50">
                            <label for="">Trên 50 triệu</label>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
  </form>

@push('scripts')
<script type="text/javascript">
    $('[name="filter_price"]').change(function(event) {
        $('#filter_price').submit();
    });
    </script>
@endpush