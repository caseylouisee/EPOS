@extends('master')
@section('title','Customer')

@section('content')

	<div class="col-md-13">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>{{$customer->company_name}}</strong>
			<strong><a href="/customers/{{$customer->id}}/edit" class="btn btn-default pull-right">Edit Customer</a></strong><br>
		</div>
		<div class="panel-body">
			<p><strong>Contact Name: </strong>{{$customer->contact_name}}</p>
			<p><strong>Address: </strong><br>
				{{$customer->address_1}}<br> 
				{{$customer->address_2}}<br>
				{{$customer->address_3}}<br>
				{{$customer->town}}<br>
				{{$customer->county}}<br>
				{{$customer->postcode}}</p>
			<p><strong>Contact: </strong><br>
				{{$customer->primary_telephone}}<br>
				{{$customer->alternate_telephone}}<br>
				{{$customer->mobile}}<br>
				{{$customer->email}}</p>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Equipment</strong>
		</div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Make</th>
						<th>Model</th>
						<th>Description</th>
						<th>Link</th>
					</tr>
				</thead>
				@foreach($customer->equipment as $equipment)
				<tbody>
					<tr>
						<td>{{$equipment->make}}</td>
						<td>{{$equipment->model}}</td>
						<td>{{substr($equipment->description,0,90)}} ...</td>
						<td><a href="/equipments/{{$equipment->id}}">View</a></td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>
	</div>

@endsection
