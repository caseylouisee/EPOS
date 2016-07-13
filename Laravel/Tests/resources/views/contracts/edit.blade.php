@extends('master')
@section('title','Create a contract')

@section('content')

	<h1>Create a contract</h1>

	<!-- if there are creation errors, they will show here -->
	{!! HTML::ul($errors->all()) !!}

	<div class = "form">
		{!! Form::model($contract, array('method' => 'PATCH', 'route' => array('contracts.update', $contract->id))) !!}

		<div class="form-group">
			{!! Form::label('equip_id', 'Equipment ID') !!}
			{!! Form::text('equip_id', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>

		<div class="form-group">
			{!! Form::label('start', 'Contract Start Date') !!}
			{!! Form::text('start', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		</div>

		<div class="form-group">
			{!! Form::label('end', 'Contract End Date') !!}
			{!! Form::text('end', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		</div>
		
		<div class="form-group">
			{!! Form::label('value', 'Contract Value') !!}
			{!! Form::text('value', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		</div>

		<div class="form-group">
			{!! Form::label('type', 'Contract Type') !!}
			{!! Form::text('type', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		</div>
		
		<div class="form-group">
			{!! Form::label('status', 'Contract Status') !!}
			{!! Form::text('status', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('paid', 'Paid') !!}
			{!! Form::text('paid', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		</div>
		
		<div class="form-group">
			{!! Form::label('discount', 'Discount') !!}
			{!! Form::text('discount', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		</div>
		
		<div class="form-group">
			{!! Form::label('notes', 'Notes') !!}
			{!! Form::textArea('notes', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('invoice_date', 'Invoice Date') !!}
			{!! Form::text('invoice_date', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('invoice_sent', 'Invoice Sent?') !!}
			{!! Form::text('invoice_sent', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		{!! Form::submit('Save Contract', array('class' => 'btn btn-primary form-control')) !!}
		{!! Form::close() !!}
	</div> <!-- class="form" -->
@endsection
