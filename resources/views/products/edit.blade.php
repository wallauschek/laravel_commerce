@extends('app')
 
@section('content')
	<div class="container">
		<div class="row">
			<h1>Editing product: {{ $product->name }}</h1>

			@if ( $errors->any() )
				<ul class="alert">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
			
			{!! Form::open(['route'=>['products.update',$product->id], 'method'=>'put']) !!}
			
				<div class="form-group">
					{!! Form::label('category_id','Category:') !!}
					{!! Form::select('category_id', $categories, $product->category->id, ['class'=>'form-control']) !!}
				</div>


				<div class="form-group">
					{!! Form::label('name','Name:') !!}
					{!! Form::text('name', $product->name,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('description','Description:') !!}
					{!! Form::textarea('description', $product->description,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('price','Price:') !!}
					{!! Form::text('price', $product->price,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
				@if ($product->featured==1)
					{!! Form::checkbox('featured', 1, true) !!}
				@else 
					{!! Form::checkbox('featured', 1, false) !!}
				@endif
					{!! Form::label('featured',' Featured') !!}
				</div>

				<div class="form-group">
					@if ($product->recommend==1)
					{!! Form::checkbox('recommend', 1, true) !!}
				@else 
					{!! Form::checkbox('recommend', 1, false) !!}
				@endif
					{!! Form::label('recommend',' Recommend') !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Save product',['class'=>'btn btn-primary form-control']) !!}
				</div>
				

			{!! Form::close() !!}

		</div>
	</div>
@endsection

