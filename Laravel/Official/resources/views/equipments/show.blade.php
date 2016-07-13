@extends('master')
@section('title','Equipment')

@section('content')

	<div class="jumbotron text-center">
		<h1>{{$equipment->make}}, {{$equipment->model}}</h1>
	</div> <!-- class="jumbotron text-center" -->
	<div class="col-md-8">
		<p><strong>Make: </strong>{{$equipment->make}}<br>
		<strong>Model: </strong>{{$equipment->model}}<br> 
		<strong>Description: </strong>{{$equipment->description}}<br>
		<strong>Manufacturer: </strong><a href="/manufacturers/{{$equipment->manufacturer_id}}/">{{$equipment->manufacturer->manufacturer_name}}</a><br>
		<strong>Serial Number: </strong>{{$equipment->serial_no}}<br>
		<strong>Type: </strong>{{$equipment->type}}<br>
		
		<strong>Date Added: </strong>{{$equipment->date_added}}<br>
		<strong>Manufacturer's Warranty: </strong>{{$equipment->manufacturer_warranty_period}} Months, {{$manufacturerresult}}<br><br>
		
		@if($equipment->customer()->first()!=null)
		<strong>Assigned to: </strong><a href="/customers/{{$equipment->customer->first()->pivot->customer_id}}/">{{$equipment->customer()->first()->company_name}}</a><br>

		<strong>{{$stringToday}}</strong><br>		
		
		<strong>Install date: </strong>{{$equipment->customer()->first()->pivot->install_date}}<br>
		<strong>Internal Warranty Period: </strong>{{$equipment->customer()->first()->pivot->internal_warranty_period}} Months, {{$internalresult}}<br>
		<strong>Payment Method: </strong>{{$equipment->customer()->first()->pivot->payment_method}}<br>
		<strong>Lease Term: </strong>{{$equipment->customer()->first()->pivot->lease_term}}<br>
		<strong>Notes: </strong>{{$equipment->customer()->first()->pivot->notes}}<br><br>
		@endif
		
		@if($equipment->contract!=null)
			@foreach($equipment->contract as $contract)
				<strong><a href="/contracts/{{$contract->id}}/"> Contract {{$contract->id}} </a></strong>
			@endforeach
		@endif
	</div> <!-- class="col-md-8" -->
	
	<strong><a href="/equipments/{{$equipment->id}}/edit" class="btn btn-default pull-right">Edit equipment/service</a></strong>
	
@endsection
