@extends('app')
 
@section('content')
	<div class="container">
		<div class="row">
			<h1>Create product</h1>

			@if ( $errors->any() )
				<ul class="alert">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
			
			{!! Form::open(['route'=>'products.store']) !!}
			
				<div class="form-group">
					{!! Form::label('category_id','Category:') !!}
					{!! Form::select('category_id', $categories, null,['class'=>'form-control']) !!}
				</div>


				<div class="form-group">
					{!! Form::label('name','Name:') !!}
					{!! Form::text('name', null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('description','Description:') !!}
					{!! Form::textarea('description', null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('price','Price:') !!}
					{!! Form::text('price', null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('featured','Featured:') !!}
					{!! Form::checkbox('featured', '1', null) !!}
				</div>

				<div class="form-group">
					{!! Form::label('recommend','Recommend:') !!}
					{!! Form::checkbox('recommend', '1', null) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Add product',['class'=>'btn btn-primary form-control']) !!}
				</div>
				

			{!! Form::close() !!}

		</div>
	</div>
@endsection

