@extends('admin.main')

@section('content')
    <div style="display: flex; justify-content: space-around">
        <table class="table" style="width: 38%; text-align: center; border: 1px solid #ddd;margin-top: 15px">
            <thead>
            <tr>
                <th style="background-color: #e3d160" colspan="2">THÔNG TIN ĐẶT HÀNG</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>Tên Khách Hàng</td>
                <td><strong>{{ $customer->name }}</strong></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><strong>{{ $customer->phone }}</strong></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><strong>{{ $customer->address }}</strong></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><strong>{{ $customer->email }}</strong></td>
            </tr>
            </tbody>
        </table>


        <div class=" p-t-15">
            @php $total = 0; @endphp
            <table class="table" style="text-align: center; border: 1px solid #ddd">
                <tbody>
                <tr><th style ="background-color: #e3d160"  colspan="6">ĐƠN HÀNG</th></tr>
                <tr class="table_head">
                    <th class="column-1">Ảnh</th>
                    <th class="column-2">Tên Sản Phẩm</th>
                    <th class="column-3">Giá</th>
                    <th class="column-4">Số lượng</th>
                    <th class="column-5">Thành tiền</th>
                    <th cla>Trạng thái</th>
                </tr>

                @foreach($carts as $key => $cart)
                    @php
                        $price = $cart->price * $cart->qty;
                        $total += $price;
                    @endphp
                    <tr class="table_row">
                        <td class="column-1">
                            <div class="" style="align-items: center;">
                                <img style="width: 50px" src="{{ $cart->product->thumb }}" alt="IMG">
                            </div>
                        </td>
                        <td class="column-2" style="text-align: center">{{ $cart->product->name }}</td>
                        <td class="column-3 p-l-10"
                            style="text-align: center">{{ number_format($cart->price,0,'','.') }}</td>
                        <td class="column-4">{{ $cart->qty }}</td>
                        <td class="column-5">{{ number_format($price,0,'','.') }}</td>
                        <td>{!! \App\Helpers\Helper::activeOrder($cart->active) !!}</td>
                    </tr>
                @endforeach
                </tbody>
                <tr>
                    <td colspan="4" class="text-right" style="font-size: 20px; font-weight: bold">Tổng tiền</td>
                    <td style="color: red;font-size: 20px; font-weight: bold;"> {{ number_format($total,0,'','.') }}
                        <sup>đ</sup>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="m-tb-20" style="display: flex; justify-content: center ">
        <a href="/admin/ship/{{$cart->id}}" class="btn btn-warning m-r-20">Giao hàng</a>
        <a href="/admin/successShip/{{$cart->id}}" class="btn btn-success m-r-20">Giao thành công</a>
        <a href="/admin/cancelShip/{{$cart->id}}" class="btn btn-danger m-r-20">Hủy đơn hàng</a>
    </div>

@endsection


