<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $cart;

    public function __construct(Cart $cart){
        $this->cart = $cart;

    }

    public function index(){

        if(!Session::has('cart')){
            Session::set('cart', $this->cart);
        }

        return view('store.cart', ['cart' => Session::get('cart')]);

    }

    public function add($id){

        $cart = $this->getCart();

        $product = Product::find($id);
        $cart->add($id, $product->name, $product->price);

        Session::set('cart',$cart);

        return redirect()->route('cart');

    }

    public  function destroy($id){

        $cart = $this->getCart();

        $cart->remove($id);
        Session::set('cart', $cart);

        return redirect()->route('cart');

    }

    public  function incrementQtd($id){

        $cart = $this->getCart();
        $cart->increment($id);
        //dd($cart);
        Session::set('cart', $cart);

        return redirect()->route('cart');

    }
    public  function decrementQtd($id){

        $cart = $this->getCart();
        $cart->decrement($id);
        //dd($cart);
        Session::set('cart', $cart);

        return redirect()->route('cart');

    }

    /**
     * @return Cart
     */
    private function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');

        } else {
            $cart = $this->cart;

        }
        return $cart;
    }
}
