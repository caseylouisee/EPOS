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
			{!! Form::select('manufacturer_id', $manufacturers, Input::old('manufacturer_id'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<!-- Manufacturer -->
		<div class="manufacturer">
		<div class="form-group">
			{!! Form::label('manufacturer', 'Manufacturer Name') !!}
			{!! Form::text('manufacturer_name', Input::old('manufacturer_name'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('contact_name', 'Contact Name') !!}
			{!! Form::text('contact_name', Input::old('contact_name'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('account_no', 'Account Number') !!}
			{!! Form::text('account_no', Input::old('account_no'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
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
			{!! Form::label('fax', 'Fax') !!}
			{!! Form::text('fax', Input::old('fax'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'E-mail') !!}
			{!! Form::text('email', Input::old('email'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('website', 'Website') !!}
			{!! Form::text('website', Input::old('website'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		</div>
		
		<!-- Equipment -->
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
			{!! Form::label('date_added', 'Date Added') !!}
			{!! Form::text('date_added', Input::old('date_added'), ['class'=>'form-control', 'style'=>'font-size: 20px', 'placeholder' => 'DD-MM-YYYY']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('manufacturer_warranty_period', 'Manufacturer Warranty Period') !!}
			{!! Form::select('manufacturer_warranty_period', $warranty_periods, Input::old('manufacturer_warranty_period'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>		
				
		<div class="form-group">
			{!! Form::label('assigned', 'Assign/Unsign') !!}
				{!! Form::checkbox('assign_checkbox', 'assign', false, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<!-- Assign Equipment -->
		<div class="customerequipment">
		<div class="form-group">
			{!! Form::label('customer_id', 'Customer ID') !!}
			{!! Form::select('customer_id', $customers, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('install_date', 'Install Date') !!}
			{!! Form::text('install_date', Input::old('install_date'), ['class'=>'form-control', 'style'=>'font-size: 20px', 'placeholder' => 'DD-MM-YYYY']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('internal_warranty_period', 'Internal Warranty Period') !!}
			{!! Form::select('internal_warranty_period', $warranty_periods, Input::old('internal_warranty_period'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('lease_term', 'Lease Term') !!}
			{!! Form::text('lease_term', Input::old('lease_term'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('payment_method', 'Payment Method') !!}
			{!! Form::select('payment_method', array('Cash' => 'Cash', 'Cheque' => 'Cheque', 'Standing Order' => 'Standing Order', 'Finance' => 'Finance', 'BACS' => 'BACS'), null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('notes', 'Notes') !!}
			{!! Form::textArea('notes', Input::old('notes'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		</div>
				
		{!! Form::submit('Add Equipment', array('class' => 'btn btn-primary form-control')) !!}
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
	
	$('select[name=manufacturer_id]').change(function () {
		if ($(this).val() == 'Add New') {
			$('.manufacturer').show();
		} else {
			$('.manufacturer').hide();
		}
	});
});
</script>
@endsection
