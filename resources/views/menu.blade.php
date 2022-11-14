
<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body >

<!-- Header -->
@include('header')

<!-- Cart -->
@include('cart')

{{--product--}}

    <div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52 p-t-80">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">

               <span>Trang chủ <span>&#160;</span> <span style="font-size: 16px">&#62;</span>  <span>&#160;</span> {{ $title }}</span>

            </div>


            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter p-lr-40 ">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Sắp xếp theo
                </div>

            </div>



            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class=" flex-w bg6 w-25 p-lr-40 p-t-27 p-lr-15-sm"  style="float: right !important;">
                    <div class=" p-r-15 p-b-27">
                        <ul>
                            <li class="p-b-6">
                                <a href="{{ request()->url() }}" class="filter-link stext-106 trans-04">
                                    Mặc định
                                </a>
                            </li>
                            <li class="p-b-6">
                                <a href="{{ request()->fullUrlWithQuery(['price'=> 'asc']) }}" class="filter-link stext-106 trans-04">
                                    Giá từ thấp đến cao
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{ request()->fullUrlWithQuery(['price'=> 'desc']) }}" class="filter-link stext-106 trans-04">
                                    Giá từ cao đến thấp
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

                @include('product.list')
        <div class="card-footer clearfix">
            {!! $products->links() !!}
        </div>
    </div>
</div>


<!-- Footer -->
@include('footer')
</body>
</html>
