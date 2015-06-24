@extends('app')
 
@section('content')
	<div class="container">
		<div class="row">
			<h1>Categories</h1>
			<br>
			<br>
			<a href="{{ route('categories.create')}}" class="btn btn-default">Nova categoria</a>
			<br>
			<br>
			<table class="table">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
				@foreach($categories as $category)
				<tr>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td>{{ $category->description }}</td>
					<td><a href="{{ route('categories.destroy', ['id'=>$category->id]) }}">deletar</a> | <a href="{{ route('categories.edit', ['id'=>$category->id]) }}">Editar</a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection

