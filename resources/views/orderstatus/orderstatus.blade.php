@extends('main')

@section('content')

    <div class="bor12 p-t-15 m-t-150 m-b-100 w-100" >
        @php $totalStatus = 0; @endphp
        <table class="table text-center w-100" style=" border: 1px solid #ddd; margin: auto">
            <tbody>
            <tr><th class="text-center text-bold" style ="background-color: #70d32e; font-size: 20px" colspan="7">ĐƠN HÀNG</th></tr>
            <tr class="table_head" >
                <th class="column-1 text-center">Ảnh</th>
                <th class="column-2 text-center">Tên Sản Phẩm</th>
                <th class="column-3 text-center">Giá</th>
                <th class="column-4 text-center">Số lượng</th>
                <th class="column-5 text-center">Thành tiền</th>
                <th  class=" text-center">Trạng thái</th>
                <th>&nbsp;</th>
            </tr>

            @foreach($orderStatuses as $key => $orderStatus)
                @php
                    $priceStatus = $orderStatus->price * $orderStatus->qty;
                    $totalStatus += $priceStatus;
                @endphp
                <tr class="table_row">
                    <td class="column-1">
                        <div class="" style="align-items: center;">
                            <img style="width: 50px" src="{{ $orderStatus->product->thumb }}" alt="IMG">
                        </div>
                    </td>
                    <td class="column-2" style="text-align: center">{{ $orderStatus->product->name }}</td>
                    <td class="column-3 p-l-10"
                        style="text-align: center">{{ $orderStatus->price }}</td>
                    <td class="column-4">{{ $orderStatus->qty }}</td>
                    <td class="column-5">{{ number_format($priceStatus,0,'','.') }}</td>
                    <td >{!! \App\Helpers\Helper::activeOrder($orderStatus->active) !!}</td>
                    <td><a href="orderStatus/destroy/{{ $orderStatus->id }}" class="btn btn-danger">Hủy đơn</a></td>
                </tr>
            @endforeach
            </tbody>
            <tr>
                <td colspan="6" class="text-right" style="font-size: 20px; font-weight: bold">Tổng tiền</td>
                <td style="color: red;font-size: 20px; font-weight: bold;"> {{ number_format($totalStatus,0,'','.') }}
                    <sup>đ</sup>
                </td>
            </tr>
        </table>
    </div>
@endsection
