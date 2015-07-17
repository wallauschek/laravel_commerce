@extends('app')
 
@section('content')
	<div class="container">
		<div class="row">
			<h1>Orders</h1>
			<br>
			<br>
			<br>
			<br>
			{!! $orders->render() !!}
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
                    <td>{!! Form::select('status-'.$order->id, $status, $order->status,['class'=>'form-control status', 'data-id'=>$order->id]) !!}</td>
                </tr>
                @endforeach
                </tbody>
            </table>

			{!! $orders->render() !!}
		</div>
	</div>
@endsection

@section('js')
    <script>
        jQuery(document).ready(function(){
           $('.status').change(function(){
               var status = $(this).val();
               var id = $(this).attr('data-id');
               $.get("{{ url('altera-status-order') }}",
                   {status: status, id: id},
                   function(resposta){

                   }
               )
           })
        });
    </script>
@endsection

