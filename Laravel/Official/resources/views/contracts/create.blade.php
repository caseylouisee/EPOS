@extends('master')
@section('title','Create a contract')

@section('content')

	<h1>Create a contract</h1>

	<!-- if there are creation errors, they will show here -->
	{!! HTML::ul($errors->all()) !!}

	<div class = "form">
		{!! Form::open(array('url' => 'contracts')) !!}

		<div class="form-group">
			{!! Form::label('equipment_id', 'Equipment ID') !!}
			{!! Form::select('equipment_id', $equipments, Input::old('equipment_id'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('start', 'Contract Start Date') !!}
			{!! Form::text('start', Input::old('start'), ['class'=>'form-control', 'style'=>'font-size: 20px', 'placeholder'=>'DD-MM-YYYY']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('length', 'Contract Length') !!}
			{!! Form::select('length', $warranty_periods, Input::old('length'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
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
		
		{!! Form::submit('Create Contract', array('class' => 'btn btn-primary form-control')) !!}
		{!! Form::close() !!}
	</div> <!-- class="form" -->
@endsection
