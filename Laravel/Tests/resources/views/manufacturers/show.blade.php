@extends('master')
@section('title','Manufacturer')

@section('content')
	<div class="col-md-13">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>{{$manufacturer->manufacturer_name}}</strong>
			<strong><a href="/manufacturers/{{$manufacturer->id}}/edit" class="btn btn-default pull-right">Edit Manufacturer</a></strong><br>
		</div>
		<div class="panel-body">
			<p><strong>Contact Name: </strong>{{$manufacturer->contact_name}}</p>
			<p><strong>Address: </strong><br>
				{{$manufacturer->address_1}}<br> 
				{{$manufacturer->address_2}}<br>
				{{$manufacturer->town}}<br>
				{{$manufacturer->county}}<br>
				{{$manufacturer->postcode}}</p>
			<p><strong>Contact: </strong><br>
				{{$manufacturer->primary_telephone}}<br>
				{{$manufacturer->alternate_telephone}}<br>
				{{$manufacturer->fax}}<br>
				{{$manufacturer->email}}</p>
			<p><strong>Account Number: </strong>{{$manufacturer->account_no}}</p>
		</div>
	</div>
	
		<table>
			<caption><h1>Equipment</h1></caption>
			<thead>
				<tr>
					<th>Make</th>
					<th>Model</th>
					<th>Description</th>
					<th>Link</th>
				</tr>
			</thead>
			@foreach($manufacturer->equipment as $equipment)
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

@endsection
