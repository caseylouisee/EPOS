@extends('master')
@section('title','Add Equipment')

@section('content')

	<h1>Add Equipment</h1>

	<!-- if there are creation errors, they will show here -->
	{!! HTML::ul($errors->all()) !!}

	<div class = "form">
		{!! Form::model($equipment, array('method' => 'PATCH', 'route' => array('equipments.update', $equipment->id))) !!}
		
		<div class="form-group">
			{!! Form::label('make', 'Make') !!}
			{!! Form::text('make', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('model', 'Model') !!}
			{!! Form::text('model', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('description', 'Description') !!}
			{!! Form::textArea('description', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('manufacturer_id', 'Manufacturer') !!}
			{!! Form::select('manufacturer_id', $manufacturers, Input::old('manufacturer_id'),['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('serial_no', 'Serial Number') !!}
			{!! Form::text('serial_no', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('type', 'Type') !!}
			{!! Form::text('type', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('license_no', 'License Number') !!}
			{!! Form::text('license_no', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('manufacturer_warranty_period', 'Manufacturer Warranty Period') !!}
			{!! Form::text('manufacturer_warranty_period', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>	
		
		<div class="form-group">
			{!! Form::label('customer_id', 'Customer ID') !!}
			{!! Form::select('customer_id', $customers, Input::old('customer_id'),['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>	
		
		<div class="form-group">
			{!! Form::label('install_date', 'Install Date') !!}
			{!! Form::text('install_date', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('internal_warranty_period', 'Internal Warranty Period') !!}
			{!! Form::text('internal_warranty_period', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('purchase_value', 'Purchase Value') !!}
			{!! Form::text('purchase_value', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('payment_method', 'Payment Method') !!}
			{!! Form::text('payment_method', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('notes', 'Notes') !!}
			{!! Form::textArea('notes', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>	
		
		{!! Form::submit('Save Changes!', array('class' => 'btn btn-primary form-control')) !!}
		{!! Form::close() !!}
	</div> <!-- class="form" -->
@endsection
