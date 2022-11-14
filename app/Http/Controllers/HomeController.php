<?php

namespace App\Http\Controllers;

use App\Http\Service\Slider\SliderService;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Service\Menu\MenuService;
use App\Http\Service\Product\ProductService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu,
    ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product =$product;
    }

    public function index(){
        return view('home',[
            'title'=>'NTC Store',
            'sliders'=> $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->get()
        ]);
    }

    public function loadProduct(Request $request){
        $page = $request->input('page',0);
        $ressult = $this->product->get($page);

        if (count($ressult) != 0){
            $html = view('product.list',['products' => $ressult])->render();

            return response()->json([
                'html'=>$html
            ]);
        }else{
            return response()->json([
                'html'=> ''
            ]);
        }
    }
}
