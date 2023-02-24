<?php

namespace App\Http\Controllers;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id = '', $slug = '')
    {
        
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);

        return view('Client.Productdetail', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore
        ]);
    }
}
