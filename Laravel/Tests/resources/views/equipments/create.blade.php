@extends('master')
@section('title','Add Equipment')

@section('content')

	<h1>Add Equipment</h1>

	<!-- if there are creation errors, they will show here -->
	{!! HTML::ul($errors->all()) !!}

	<div class = "form">
		{!! Form::open(array('url' => 'equipments')) !!}

		<div class="form-group">
			{!! Form::label('make', 'Make') !!}
			{!! Form::text('make', Input::old('make'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('model', 'Model') !!}
			{!! Form::text('model', Input::old('model'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('description', 'Description') !!}
			{!! Form::textArea('description', Input::old('description'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('manufacturer_id', 'Manufacturer ID') !!}
			{!! Form::select('manufacturer_id', $manufacturers, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('serial_no', 'Serial Number') !!}
			{!! Form::text('serial_no', Input::old('serial_no'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('type', 'Type') !!}
			{!! Form::text('type', Input::old('type'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('license_no', 'License Number') !!}
			{!! Form::text('license_no', Input::old('license_no'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('manufacturer_warranty_period', 'Manufacturer Warranty Period') !!}
			{!! Form::text('manufacturer_warranty_period', Input::old('manufacturer_warranty_period'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>		
				
		<div class="form-group">
			{!! Form::label('customer_id', 'Customer ID') !!}
			{!! Form::select('customer_id', $customers, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>	
		
		<div class="form-group">
			{!! Form::label('install_date', 'Install Date') !!}
			{!! Form::text('install_date', Input::old('install_date'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('internal_warranty_period', 'Internal Warranty Period') !!}
			{!! Form::text('internal_warranty_period', Input::old('internal_warranty_period'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('purchase_value', 'Purchase Value') !!}
			{!! Form::text('purchase_value', Input::old('purchase_value'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('payment_method', 'Payment Method') !!}
			{!! Form::text('payment_method', Input::old('payment_method'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('notes', 'Notes') !!}
			{!! Form::textArea('notes', Input::old('notes'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		{!! Form::submit('Add Equipment', array('class' => 'btn btn-primary form-control')) !!}
		{!! Form::close() !!}
	</div> <!-- class="form" -->
@endsection
