@extends('master')
@section('title','Equipment/Service')

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
	</div> <!-- class="col-md-4" -->
	<strong><a href="/equipments/{{$equipment->id}}/edit" class="btn btn-default pull-right">Edit equipment/service</a></strong>
@endsection
