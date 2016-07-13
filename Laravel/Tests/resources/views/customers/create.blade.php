@extends('master')
@section('title','Create a Customer')

@section('content')

	<h1>Create a customer</h1>

	<!-- if there are creation errors, they will show here -->
	{!! HTML::ul($errors->all()) !!}

	<div class = "form">
		{!! Form::open(array('url' => 'customers')) !!}

		<div class="form-group">
			{!! Form::label('company_name', 'Customer Name') !!}
			{!! Form::text('company_name', Input::old('company_name'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('contact_name', 'Contact Name') !!}
			{!! Form::text('contact_name', Input::old('contact_name'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('address_1', 'Address 1') !!}
			{!! Form::text('address_1', Input::old('address_1'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('address_2', 'Address 2') !!}
			{!! Form::text('address_2', Input::old('address_2'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('address_3', 'Address 3') !!}
			{!! Form::text('address_3', Input::old('address_3'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('town', 'Town') !!}
			{!! Form::text('town', Input::old('town'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('county', 'County') !!}
			{!! Form::text('county', Input::old('county'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('postcode', 'Post Code') !!}
			{!! Form::text('postcode', Input::old('postcode'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('primary_telephone', 'Primary Telephone') !!}
			{!! Form::text('primary_telephone', Input::old('primary_telephone'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('alternate_telephone', 'Alternate Telephone') !!}
			{!! Form::text('alternate_telephone', Input::old('alternate_telephone'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('mobile', 'Mobile') !!}
			{!! Form::text('mobile', Input::old('mobile'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'E-mail') !!}
			{!! Form::text('email', Input::old('email'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		{!! Form::submit('Create customer', array('class' => 'btn btn-primary form-control')) !!}
		{!! Form::close() !!}
	</div> <!-- class="form" -->
@endsection
