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
			{!! Form::label('fax', 'Fax') !!}
			{!! Form::text('fax', Input::old('fax'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'E-mail') !!}
			{!! Form::text('email', Input::old('email'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('headOffice', 'Add Head Office') !!}
			{!! Form::checkbox('head_office_checkbox', 'headOffice', false)!!}
		</div>
		
		<!-- Assign Head Office -->
		<div class="headoffice">
		<h1>Head Office</h1>
		
		<div class="form-group">
			{!! Form::label('head_office_contact_name', 'Contact Name') !!}
			{!! Form::text('head_office_contact_name', Input::old('head_office_contact_name'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('head_office_address_1', 'Address 1') !!}
			{!! Form::text('head_office_address_1', Input::old('head_office_address_1'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_address_2', 'Address 2') !!}
			{!! Form::text('head_office_address_2', Input::old('head_office_address_2'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_address_3', 'Address 3') !!}
			{!! Form::text('head_office_address_3', Input::old('head_office_address_3'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_town', 'Town') !!}
			{!! Form::text('head_office_town', Input::old('head_office_town'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_county', 'County') !!}
			{!! Form::text('head_office_county', Input::old('head_office_county'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_postcode', 'Post Code') !!}
			{!! Form::text('head_office_postcode', Input::old('head_office_postcode'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_primary_telephone', 'Primary Telephone') !!}
			{!! Form::text('head_office_primary_telephone', Input::old('head_office_primary_telephone'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_alternate_telephone', 'Alternate Telephone') !!}
			{!! Form::text('head_office_alternate_telephone', Input::old('head_office_alternate_telephone'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('head_office_mobile', 'Mobile') !!}
			{!! Form::text('head_office_mobile', Input::old('head_office_mobile'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('head_office_email', 'E-mail') !!}
			{!! Form::text('head_office_email', Input::old('head_office_email'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		</div>

		{!! Form::submit('Create customer', array('class' => 'btn btn-primary form-control')) !!}
		{!! Form::close() !!}
	</div> <!-- class="form" -->
@endsection

@section('footer')
<script>
$(document).ready(function(){
	$('input[type="checkbox"]').click(function(){
		if($(this).attr("value")=="headOffice"){
			$(".headoffice").toggle();
		}
	});
});
</script>
@endsection
