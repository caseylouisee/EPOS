@extends('master')
@section('title','Add Equipment')

@section('content')

	<h1>Add Equipment</h1>

	<!-- if there are creation errors, they will show here -->
	{!! HTML::ul($errors->all()) !!}

	<div class = "form">
		{!! Form::model($equipment, array('method' => 'PATCH', 'route' => array('equipments.update', $equipment->id))) !!}
		
		{!! Form::open(array('url' => 'equipments')) !!}
		
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
			{!! Form::label('manufacturer_id', 'Manufacturer ID') !!}
			{!! Form::select('manufacturer_id', $manufacturers, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
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
			{!! Form::label('date_added', 'Date Added') !!}
			{!! Form::text('date_added', null, ['class'=>'form-control', 'style'=>'font-size: 20px', 'placeholder'=>'DD-MM-YYYY']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('manufacturer_warranty_period', 'Manufacturer Warranty Period') !!}
			{!! Form::select('manufacturer_warranty_period', $warranty_periods, Input::old('manufacturer_warranty_period'),['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>		
					
		<!-- If no customer_equipment link stored -->						
		@if($customer_equipment===null)				
		<div class="form-group">
			{!! Form::label('assigned', 'Assign/Unsign') !!}
				{!! Form::checkbox('assign_checkbox', 'assign', false, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="customerequipment">
		<div class="form-group">
			{!! Form::label('customer_id', 'Customer ID') !!}
			{!! Form::select('customer_id', $customers, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
					
		<div class="form-group">
			{!! Form::label('install_date', 'Install Date') !!}
			{!! Form::text('install_date', null, ['class'=>'form-control', 'style'=>'font-size: 20px', 'placeholder'=>'DD-MM-YYYY']) !!}
		</div>
				
		<div class="form-group">
			{!! Form::label('internal_warranty_period', 'Internal Warranty Period') !!}
			{!! Form::select('internal_warranty_period', $warranty_periods, Input::old('internal_warranty_period'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
				
		<div class="form-group">
			{!! Form::label('payment_method', 'Payment Method') !!}
			{!! Form::select('payment_method', array('Cash' => 'Cash', 'Cheque' => 'Cheque', 'Standing Order' => 'Standing Order', 'Finance' => 'Finance', 'BACS' => 'BACS'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('lease_term', 'Lease Term') !!}
			{!! Form::text('lease_term', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
				
		<div class="form-group">
			{!! Form::label('notes', 'Notes') !!}
			{!! Form::textArea('notes', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		</div>
		
		<!-- if a customer_equipment record exists -->
		@else
		<div class="form-group">
			{!! Form::label('assigned', 'Assign/Unsign') !!}
				{!! Form::checkbox('assign_checkbox', 'unassign', true, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('customer_id', 'Customer ID') !!}
			{!! Form::select('customer_id', $customers, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
			
		<div class="form-group">
			{!! Form::label('install_date', 'Install Date') !!}
			{!! Form::text('install_date', $customer_equipment->install_date, ['class'=>'form-control', 'style'=>'font-size: 20px', 'placeholder'=>'DD-MM-YYYY']) !!}
		</div>
				
		<div class="form-group">
			{!! Form::label('internal_warranty_period', 'Internal Warranty Period') !!}
			{!! Form::select('internal_warranty_period', $warranty_periods, $customer_equipment->internal_warranty_period, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
				
		<div class="form-group">
			{!! Form::label('payment_method', 'Payment Method') !!}
			{!! Form::select('payment_method', array('Cash' => 'Cash', 'Cheque' => 'Cheque', 'Standing Order' => 'Standing Order', 'Finance' => 'Finance', 'BACS' => 'BACS'), $customer_equipment->payment_method, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('lease_term', 'Lease Term') !!}
			{!! Form::text('lease_term', $customer_equipment->lease_term, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
				
		<div class="form-group">
			{!! Form::label('notes', 'Notes') !!}
			{!! Form::textArea('notes', $customer_equipment->notes, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		@endif
				
		{!! Form::submit('Save Changes', array('class' => 'btn btn-primary form-control')) !!}
			{!! Form::close() !!}
		</div> <!-- class="form" -->
		
@endsection

@section('footer')
<script>
	$(document).ready(function(){				
		$('input[type="checkbox"]').click(function(){
			if($(this).attr("value")=="assign"){
				$(".customerequipment").toggle();
			}
		});
	});	
</script>		
@endsection
