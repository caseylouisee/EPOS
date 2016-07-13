@extends('master')
@section('title','Edit Customer')

@section('content')

	<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all()) }}
	
	<div class = "form">
		{!! Form::model($customer, array('method' => 'PATCH', 'route' => array('customers.update', $customer->id))) !!}
		
		<div class="form-group">
			{!! Form::label('company_name', 'Customer Name') !!}
			{!! Form::text('company_name', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>

		<div class="form-group">
			{!! Form::label('contact_name', 'Contact Name') !!}
			{!! Form::text('contact_name', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>

		<div class="form-group">
			{!! Form::label('address_1', 'Address 1') !!}
			{!! Form::text('address_1', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('address_2', 'Address 2') !!}
			{!! Form::text('address_2', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}	
		</div>
		
		<div class="form-group">
			{!! Form::label('address_3', 'Address 3') !!}
			{!! Form::text('address_3', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('town', 'Town') !!}
			{!! Form::text('town', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('county', 'County') !!}
			{!! Form::text('county', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('postcode', 'Post Code') !!}
			{!! Form::text('postcode', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('primary_telephone', 'Primary Telephone') !!}
			{!! Form::text('primary_telephone', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}			</div>
		
		<div class="form-group">
			{!! Form::label('alternate_telephone', 'Alternate Telephone') !!}
			{!! Form::text('alternate_telephone', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}			</div>

		<div class="form-group">
			{!! Form::label('mobile', 'Mobile') !!}
			{!! Form::text('mobile', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('fax', 'Fax') !!}
			{!! Form::text('fax', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'E-mail') !!}
			{!! Form::text('email', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
		</div>
		
		<div class="form-group">
			{!! Form::label('headOffice', 'Add Head Office') !!}
			{!! Form::checkbox('head_office_checkbox', 'headOffice', false, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<!-- Assign Head Office -->
		<div class="headoffice">
		<h1>Head Office</h1>
		
		<div class="form-group">
			{!! Form::label('head_office_contact_name', 'Contact Name') !!}
			{!! Form::text('head_office_contact_name', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('head_office_address_1', 'Address 1') !!}
			{!! Form::text('head_office_address_1', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_address_2', 'Address 2') !!}
			{!! Form::text('head_office_address_2', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_address_3', 'Address 3') !!}
			{!! Form::text('head_office_address_3', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_town', 'Town') !!}
			{!! Form::text('head_office_town', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_county', 'County') !!}
			{!! Form::text('head_office_county', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_postcode', 'Post Code') !!}
			{!! Form::text('head_office_postcode', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_primary_telephone', 'Primary Telephone') !!}
			{!! Form::text('head_office_primary_telephone', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('head_office_alternate_telephone', 'Alternate Telephone') !!}
			{!! Form::text('head_office_alternate_telephone', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('head_office_mobile', 'Mobile') !!}
			{!! Form::text('head_office_mobile', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('head_office_email', 'E-mail') !!}
			{!! Form::text('head_office_email', null, ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		</div>
		
		{!! Form::submit('Save changes!', array('class' => 'btn btn-primary form-control')) !!}
		{!! Form::close() !!}
	</div><!-- class="form" -->
	
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