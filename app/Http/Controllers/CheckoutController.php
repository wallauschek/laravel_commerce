<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;
use Zendframework\ZendConfig\Src\Reader\Xml;


class CheckoutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function place(Order $orderModel, OrderItem $orderItem, CheckoutService $checkoutService){
        if(!Session::has('cart')){
            return false;
        }

        $categories = Category::all();

        $cart = Session::get('cart');

        if($cart->getTotal()>0){


            $order = $orderModel->create(['user_id'=>Auth::user()->id, 'total'=>$cart->getTotal()]);
            
            $checkout = $checkoutService->createCheckoutBuilder();
            $checkout->setReference($order->id);

            foreach($cart->all() as $k=>$item){
                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'], 2, '.', ''), $item['qtd']));
                $order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
            }

            $cart->clear();

            event(new CheckoutEvent(Auth::user(), $order));

            $response = $checkoutService->checkout($checkout->getCheckout());


            return redirect($response->getRedirectionUrl());
        }



        return view('store.checkout', ['cart'=>'empty', 'categories'=>$categories]);

    }

    public function test($cod){ 

        $minha_url_para_ler = "https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/
        $cod
        ?email=tibarj@gmail.com&token=ED015FB267FE40DBA7B12A120F4DDD40";

        $reader = new Zend\Config\Reader\Xml();
        $data   = $reader->fromString(file_get_contents($minha_url_para_ler));

        echo $data['reference'];
       

    }


}
