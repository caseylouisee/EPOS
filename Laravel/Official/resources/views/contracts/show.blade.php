@extends('master')
@section('title','Contract')

@section('content')

	<div class="jumbotron text-center">
		<h1>{{$contract->id}}</h1>
	</div> <!-- class="jumbotron text-center" -->
	<div class="col-md-8">
		<p><strong>Equipment ID: </strong><a href="/equipments/{{$contract->equip_id}}/">{{$contract->equipment_id}}</a><br>
		<strong>Start Date: </strong>{{$contract->start}}<br> 
		<strong>End Date: </strong>{{$endDate}}<br>
		<strong>Value: </strong>{{$contract->value}}<br>
		<strong>Type: </strong>{{$contract->type}}<br>
		<strong>Status: </strong>{{$status}}<br>
		<strong>Paid: </strong>{{$contract->paid}}</p>
		<strong>Discount: </strong>{{$contract->discount}}<br>
		<strong>Notes: </strong>{{$contract->notes}}<br>
	</div> <!-- class="col-md-4" -->
	<strong><a href="/contracts/{{$contract->id}}/edit" class="btn btn-default pull-right">Edit contract</a></strong>
@endsection
