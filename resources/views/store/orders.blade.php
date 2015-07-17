
@extends('store.store')


@section('content')

<div class="col-sm-9 padding-right">
  <h3>Meus Pedidos</h3>
    <table class="table">
        <tbody>
        <tr>
            <th>#ID</th>
            <th>Items</th>
            <th>Valor</th>
            <th>Status</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>
                <ul>
                @foreach($order->items as $item)
                    <li>{{ $item->product->name }}</li>
                @endforeach
                </ul>
            </td>
            <td>{{ $order->total }}</td>
            <td>{{ $order->statusExt }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@stop