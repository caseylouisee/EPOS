@extends('master')
@section('title','Create a contract')

@section('content')

	<h1>Create a contract</h1>

	<!-- if there are creation errors, they will show here -->
	{!! HTML::ul($errors->all()) !!}

	<div class = "form">
		{!! Form::model($contract, array('method' => 'PATCH', 'route' => array('contracts.update', $contract->id))) !!}

		<div class="form-group">
			{!! Form::label('equipment_id', 'Equipment ID') !!}
			{!! Form::select('equipment_id', $equipments, Input::old('equipment_id'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('start', 'Contract Start Date') !!}
			{!! Form::text('start', null, ['class'=>'form-control', 'style'=>'font-size: 20px', 'placeholder'=>'DD-MM-YYYY']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('length', 'Contract Length') !!}
			{!! Form::select('length', $warranty_periods, Input::old('length'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>	
		
		<div class="form-group">
			{!! Form::label('value', 'Contract Value') !!}
			{!! Form::text('value', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}			</div>

		<div class="form-group">
			{!! Form::label('type', 'Contract Type') !!}
			{!! Form::text('type', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>

		
		<div class="form-group">
			{!! Form::label('paid', 'Paid') !!}
			{!! Form::text('paid', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('discount', 'Discount') !!}
			{!! Form::text('discount', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		</div>
		
		<div class="form-group">
			{!! Form::label('notes', 'Notes') !!}
			{!! Form::textArea('notes', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		{!! Form::submit('Save Contract', array('class' => 'btn btn-primary form-control')) !!}
		{!! Form::close() !!}
	</div> <!-- class="form" -->
@endsection
