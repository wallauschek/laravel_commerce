<?php

namespace codeCommerce\Http\Controllers;

use codeCommerce\Product;
use Illuminate\Http\Request;

use codeCommerce\Http\Requests;
use codeCommerce\Http\Controllers\Controller;

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
