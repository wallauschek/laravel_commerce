<?php

namespace codeCommerce\Http\Controllers;

use codeCommerce\Category;
use Illuminate\Http\Request;

use codeCommerce\Http\Requests;
use codeCommerce\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    private $categories;

    public function __construct(Category $category){
        $this->middleware('guest');
        $this->categories = $category;
    }


    public function index()
    {
        $categories = $this->categories->all();
        return view("listCategories", compact('categories'));
    }

}
