<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Service\Cart\CartService;
use  Toastr;

class OrderController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart =$cart;
    }

    public function index()
    {
        return view('admin.carts.customer',[
            'title'=> 'Danh sách đơn hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);
        return view('admin.carts.detail',[
            'title'=> 'Chi tiết đơn hàng của'.' ' . $customer->name,
            'customer'=> $customer,
            'carts'=>  $carts
        ]);
    }

    public function active($id){
        Cart::where('id',$id)->update([
            'active'=> '1'
        ]);

       Toastr::success('Hàng đang giao','Thành công');
       return redirect()->back();
    }

    public function successShip($id){
        Cart::where('id',$id)->update([
            'active'=> '2'
        ]);

        Toastr::success('Giao hàng thành công','Thành công');
        return redirect()->back();
    }

    public function cancelShip($id){
        Cart::where('id',$id)->update([
            'active'=> '3'
        ]);

        Toastr::error('Hủy đơn hàng','Hủy');
        return redirect()->back();
    }


}
