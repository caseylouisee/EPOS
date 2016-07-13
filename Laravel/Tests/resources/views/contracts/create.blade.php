@extends('master')
@section('title','Create a contract')

@section('content')

	<h1>Create a contract</h1>

	<!-- if there are creation errors, they will show here -->
	{!! HTML::ul($errors->all()) !!}

	<div class = "form">
		{!! Form::open(array('url' => 'contracts')) !!}

		<div class="form-group">
			{!! Form::label('equip_id', 'Equipment ID') !!}
			{!! Form::text('equip_id', Input::old('equip_id'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('start', 'Contract Start Date') !!}
			{!! Form::text('start', Input::old('start'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('end', 'Contract End Date') !!}
			{!! Form::text('end', Input::old('end'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('value', 'Contract Value') !!}
			{!! Form::text('value', Input::old('value'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('type', 'Contract Type') !!}
			{!! Form::text('type', Input::old('type'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('status', 'Contract Status') !!}
			{!! Form::text('status', Input::old('status'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('paid', 'Paid') !!}
			{!! Form::text('paid', Input::old('paid'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('discount', 'Discount') !!}
			{!! Form::text('discount', Input::old('discount'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('notes', 'Notes') !!}
			{!! Form::textArea('notes', Input::old('notes'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('invoice_date', 'Invoice Date') !!}
			{!! Form::text('invoice_date', Input::old('invoice_date'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('invoice_sent', 'Invoice Sent?') !!}
			{!! Form::text('invoice_sent', Input::old('invoice_sent'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		{!! Form::submit('Create Contract', array('class' => 'btn btn-primary form-control')) !!}
		{!! Form::close() !!}
	</div> <!-- class="form" -->
@endsection
