<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Service\Cart\CartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Toastr;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService =$cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->creat($request);

        if ($result == false ) {
            return redirect()->back();
        }

        return redirect('/carts');
    }

    public function show(Customer $customer){
        $products = $this->cartService->getProduct();
        return view('carts.list',[
           'title' => 'Giỏ hàng',
            'products' => $products,
            'carts'=> Session::get('carts'),
            'customers'=> $customer
        ]);
    }

    public function update(Request $request){
        $this->cartService->update($request);

        return redirect('/carts');
    }

    public function remove($id = 0){
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function order(Request $request){

       $result = $this->cartService->order($request);

       if ($result){
           Toastr::success('Đặt hàng thành công','Thành công');

           #queues
           SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
       }else{

           Toastr::error('Đặt hàng không thành công','Thất bại');
       }
        return redirect()->back();
    }
}
