<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');  
    }
    
}
