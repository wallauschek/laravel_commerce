@extends('app')
 
@section('content')
	<div class="container">
		<div class="row">
			<h1>Products</h1>
			<br>
			<br>
			<a href="{{ route('products.create')}}" class="btn btn-default">Novo Produto</a>
			<br>
			<br>
			<table class="table">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Featured</th>
					<th>Recommend</th>
					<th>Action</th>
				</tr>
				@foreach($products as $product)
				<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->name }}</td>
					<td>{{ $product->description }}</td>
					<td>{{ $product->price }}</td>
					<td>@if($product->featured==1) yes @endif </td>
					<td>@if($product->recommend==1) yes @endif</td>
					<td><a href="{{ route('products.destroy', ['id'=>$product->id]) }}">deletar</a> | <a href="{{ route('products.edit', ['id'=>$product->id]) }}">Editar</a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection

