<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;


class ProductsController extends Controller
{
    private $ProductModel;

    public function __construct(Product $ProductModel)
    {

        $this->ProductModel = $ProductModel;

    }

    public function index()
    {

        $products = $this->ProductModel->paginate(10);

        return view('products.index', compact('products'));

    }

    public function create(Category $category){

        $categories = $category->Lists('name', 'id');
        
        return view('products.create', compact('categories'));

    }

    public function store(Requests\ProductRequest $request){

        $input = $request->all();

        $product = $this->ProductModel->fill($input);
        $product -> save();

        return redirect()->route('products') ;    
    }

    public function edit($id, Category $category){
        
        $categories = $category->Lists('name', 'id');
        $product = $this->ProductModel->find($id);

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Requests\ProductRequest $request, $id){

        if (!isset($request->featured)) {
               $this->ProductModel->find($id)->update(['featured'=>0]);
        }
        if (!isset($request->recommend)) {
               $this->ProductModel->find($id)->update(['recommend'=>0]);
        }
        $this->ProductModel->find($id)->update($request->all());

        return redirect()->route('products') ;    

    }

    public function destroy($id){

        $this->ProductModel->find($id)->delete();

        return redirect()->route('products') ;    

    }

    public  function images($id){
        $product = $this->model->find($id);

        return view('products.images', compact('product'));
    }
}
