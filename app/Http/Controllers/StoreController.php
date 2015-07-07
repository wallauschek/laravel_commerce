<?php

namespace CodeCommerce\Http\Controllers;


use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\Tag;


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

        $category = Category::find($id);
        $pCategory = Product::ofCategory($id)->get();

        return view('store.products_category', compact('categories','pCategory','category'));

    }

    public function productsTag($id){

        $categories = Category::all();

        $tag = Tag::find($id);
        $pTag = Tag::find($id)->products()->get();

        return view('store.products_tag', compact('categories','pTag','tag'));

    }

    public function product($id){
        $categories = Category::all();

        $product = Product::find($id);

        return view('store.product', compact('categories','product'));
    }
}
