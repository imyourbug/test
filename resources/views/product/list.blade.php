<div class="row isotope-grid">
    @foreach($products as $key => $product)
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-pic hov-img0">

                <a href="/san-pham/{{ $product->id }} - {{\Str::slug($product->name, '-')}}.html">
                    <img src="{{ $product->thumb }}" alt="{{ $product->name }}">
                </a>

{{--                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">--}}
{{--                    Mua Ngay--}}
{{--                </a>--}}
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                    <a style="text-align: center; width: 100%" href="/san-pham/{{ $product->id }} - {{\Str::slug($product->name, '-')}}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        {{ $product->name }}
                    </a>

                    <div  class="flex" style="text-align: center; width: 100%">
                         <span style="color: red; font-size: 20px">
                            {!! \App\Helpers\Helper::price($product->price_sale) !!} <sup>đ</sup>
                        </span>

                        <span class="stext-105 cl3" style="text-decoration-line: line-through">
                            {!! \App\Helpers\Helper::price($product->price) !!} <sup>đ</sup>
					    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach
</div>
