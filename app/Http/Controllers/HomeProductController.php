<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\Product\ProductService;

class HomeProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id = '', $slug = '')
    {
       $product = $this->productService->show($id);

       return view('product.content',[
          'title' => $product->name,
          'product' => $product
       ]);
    }
}
