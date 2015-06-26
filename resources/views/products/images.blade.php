@extends('app')
 
@section('content')
	<div class="container">
		<div class="row">
			<h1>Images of {{ $product->name }}</h1>
			<br>
			<br>
			<a href="{{ route('products.images.create',['id'=>$product->id]) }}" class="btn btn-default">Nova Imagem</a>
			<br>
			<br>

			<table class="table">
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th>Extension</th>
					<th>Action</th>
				</tr>
				@foreach($product->images as $image)
				<tr>
					<td>{{ $image->id }}</td>
					<td>
                        <img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" alt="" style="width:80px;"/>
					</td>
					<td>{{ $image->extension }}</td>
					<td>
                        <a href="{{ route('products.images.destroy', ['id'=>$image->id]) }}">delete</a>
					</td>
				</tr>
				@endforeach
			</table>

            <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>

		</div>
	</div>
@endsection

