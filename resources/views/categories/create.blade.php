@extends('app')
 
@section('content')
	<div class="container">
		<div class="row">
			<h1>Create category</h1>
			
			{!! Form::open(['url'=>'categories']) !!}
			
				<div class="form-group">
					{!! Form::label('name','Name:') !!}
					{!! Form::text('name', null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('description','Description:') !!}
					{!! Form::textarea('description', null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Add category',['class'=>'btn btn-primary form-control']) !!}
				</div>
				

			{!! Form::close() !!}

		</div>
	</div>
@endsection

