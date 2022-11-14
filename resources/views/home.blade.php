
<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body >

{{--class="animsition"--}}

<!-- Header -->
@include('header')

<!-- Cart -->
@include('cart')

<!-- Slider -->
<section class="section-slide m-t-100 border-rd ">
    <div class="wrap-slick1">
        <div class="slick1">
            @foreach($sliders as $key => $slider)
                <div class="item-slick1 w-full boder-rd" style="background-image: url({{$slider->thumb}}); max-width: 2194px">
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
            @foreach($menus as $key => $menu)
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w" style="border: none">
                        <img src="{{ $menu->thumb }}" alt="IMG-BANNER" >

                        <a href="/danh-muc/{{$menu->id}} - {{\Illuminate\Support\Str::slug($menu->name,'-')}}.html"
                           class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
                                    {{ $menu->name }}
								</span>

                                <span class="block1-info stext-102 trans-04 ">
									HOT
								</span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09 ">
                                    Mua Ngay
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52 ">
            <div class="">
                <h3 class="cl5" style="font-weight: bold; text-align: center; color: red">
                    HÀNG MỚI VỀ
                </h3>
            </div>

        </div>
        <div id="loadProducts">
            @include('product.list')
        </div>
        {!! $products->links('my-pagination') !!}
        {{--        <!-- Load more -->--}}
{{--        <div class="flex-c-m flex-w w-full p-t-45" id="btn-loadMore">--}}
{{--            <input type="hidden" value="1" id="page">--}}
{{--            <a  onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">--}}
{{--                Hiển Thị Thêm Sản Phẩm--}}
{{--            </a>--}}
{{--        </div>--}}
    </div>
</section>
@include('footer')
</body>
</html>
