<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Product $product){
        $this->middleware('guest');
        $this->products = $product;
    }


    public function index()
    {
        $products = $this->products->all();
        return view("listProducts", compact('products'));
    }
}
