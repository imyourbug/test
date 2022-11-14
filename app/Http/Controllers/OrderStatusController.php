<?php

namespace App\Http\Controllers;

use App\Http\Service\OrderStatus\OrderStatusService;
use App\Models\Cart;
use Toastr;
use Illuminate\Support\Facades\Auth;

class OrderStatusController extends Controller
{
    protected $orderStatusService;

    public function __construct(OrderStatusService $orderStatusService)
    {
        $this->orderStatusService =$orderStatusService;
    }

    public function show(){
        $orders = $this->orderStatusService->getOrderStatus();
        return view('orderstatus.orderstatus',[
            'title'=> 'Trạng thái đơn hàng',
            'orderStatuses'=>  $orders
        ]);
    }

    public function destroy($id)
    {
        $active = Cart::firstWhere('id',$id);
        if ($active->active == 0){
            Cart::where('id',$id)->update([
                'active'=> '4'
            ]);

            Toastr::success('Hủy đơn hàng thành công', 'Thành công');
        }
        if ($active->active == 2){
            Toastr::warning('Đơn hàng của bạn đã giao thành công', 'Cảnh báo');
        }
        if ($active->active == 1) {
            Toastr::error('Đơn hàng đang giao không thể hủy', 'Thất bại');
        }


        return redirect('/orderStatus');
    }
}
