<?php

namespace App\Http\Controllers;

use App\Http\Service\Menu\MenuService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $menuservice;

    public function __construct(MenuService $menuService)
    {
        $this->menuservice = $menuService;
    }

    public function index(Request $request, $id, $slug = '')
    {
        $menu = $this->menuservice->getId($id);

//         dd($menu->thumb);
        $product = $this->menuservice->getProduct($menu, $request);


        return view('menu',[
           'title' => $menu->name,
           'products'=> $product,
            'menu'=> $menu
        ]);
    }
}
