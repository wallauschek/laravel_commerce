<?php

namespace CodeCommerce\Http\Controllers;


use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;

class StoreController extends Controller
{
    public function index(){

        $categories = Category::all();

        $pFeatured = Product::featured()->get();

        $pRecommend = Product::recommend()->get();

        return view('store.index', compact('categories','pFeatured', 'pRecommend'));

    }

    public function productsCategory($id){

        $categories = Category::all();

        $pCategory = Category::find($id)->products()->get();

        return view('store.products_category', compact('categories','pCategory'));

    }
}
