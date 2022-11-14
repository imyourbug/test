@extends('main')

@section('content')
    <div class="container p-t-100 " >
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04" >
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
                Giỏ hàng
            </a>

        </div>
    </div>
    <form class="bg0 p-t-75 p-b-85" method="post">
        @if(count($products) != 0)
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                @php $total = 0; @endphp
                                <table class="table-shopping-cart" >
                                    <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">Sản phẩm</th>
                                        <th class="column-2"></th>
                                        <th class="column-3" style="text-align: center">Giá</th>
                                        <th class="column" style="text-align: center">Size</th>
                                        <th class="column-4" style="text-align: center">Số lượng</th>
                                        <th class="column-5">Thành tiền</th>
                                        <th>&nbsp;</th>
                                    </tr>

                                    @foreach($products as $key => $product)
                                        @php
                                            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                            $priceEnd = $price * $carts[$product->id];
                                            $total += $priceEnd;
                                        @endphp
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="{{ $product->thumb }}" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2" style="text-align: center">{{ $product->name }}</td>
                                            <td class="column-3 p-l-10" style="text-align: center">{{ number_format($price,0,'','.') }}</td>
                                            <td class="column" style="text-align: center"></td>
                                            <td class="column-4">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                           name="num-product[{{$product->id}}]" value="{{  $carts[$product->id] }}">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="column-5">{{ number_format($priceEnd,0,'','.') }}</td>
                                            <td class="p-r-20">
                                                <a class="btn btn-danger btn-sm"
                                                   href="/carts/delete/{{$product->id}}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                <div>
                                    <a href="/"  class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                        Tiếp tục mua sắm
                                    </a>
                                </div>

                                <input type="submit" value="Cập nhật giỏ hàng" formaction="/update-cart"
                                       class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                @csrf
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Tổng giỏ hàng
                            </h4>
                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
								<span class="mtext-101 cl2">
									Tổng tiền:
								</span>
                                </div>

                                <div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									{{ number_format($total,0,'','.') }}
								</span>
                                    <sup>đ</sup>
                                </div>
                            </div>

                            <div class=" bor12 p-t-15 p-b-30">
                             <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">
                                    <div class="p-t-15">
									<span class="stext-112 cl8" style="font-weight: bold">
										Thông tin đặt hàng
									</span>
                                        <div class="bor8 bg0 m-b-12 m-t-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                   name="name" placeholder="Tên khách hàng" value="{{$customers->name}}">
                                        </div>

                                        <div class="bor8 bg0 m-b-22">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="number"
                                                   name="phone" placeholder="Số điện thoại" >
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                   name="address" placeholder="Địa chỉ giao hàng">
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                   name="email" placeholder="Email">
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <textarea class="stext-111 cl8 plh3 size-111 p-lr-15" type="name"
                                                      name="note" placeholder="Ghi chú"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Đặt hàng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </form>

    @else
        <div class="text-center" style="margin-bottom: 50px"><h3 style="color: red">Giỏ hàng trống</h3></div>
    @endif
@endsection



