<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class OrdersController extends Controller
{
    public function __construct(Order $OrderModel)
    {

        $this->OrderModel = $OrderModel;

    }

    public function index()
    {

        $orders = $this->OrderModel->paginate(10);

        $status =
            [
                '0' => 'Aguardando confirmação da Financeira',
                '1' => 'Pagamento Aprovado',
                '2' => 'Separado para entrega',
                '3' => 'Na transportadora',
                '4' => 'Entrega realizada',
                '5' => 'Cancelado'
            ];

        return view('orders.index', compact('orders', 'status'));

    }

    public function status(){
        $id = Input::get('id');
        $status = Input::get('status');

        $order = Order::find($id);
        $order->status = $status;
        $order->save();
    }
}
