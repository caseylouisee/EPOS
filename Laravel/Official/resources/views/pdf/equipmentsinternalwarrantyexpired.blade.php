@extends('pdfmaster')

@section('title','Equipment Internal Warranty')

@section('content')
	<h1>Internal Warranties Expired</h1>
	<strong> Date Produced: {{$todaysDate}} </strong>

	<table class="table">
		<thead>
			<tr>
				<th>Customer</th>
				<th>Contact</th>
				<th>Address</th>
				<th>Internal Warranty Start</th>
				<th>Warranty Period</td>
				<th>Make</th>
				<th>Model</th>
				<th>Description</th>
			</tr>
		</thead>
		@foreach($equipments as $equipment)
		<tbody>
			<tr>
				<td>{{$equipment->customer()->first()->company_name}}</td>
				<td>{{$equipment->customer()->first()->primary_telephone}}</td>
				<td>{{$equipment->customer()->first()->address_1}}<br> 
					{{$equipment->customer()->first()->address_2}}<br>
					{{$equipment->customer()->first()->address_3}}<br>
					{{$equipment->customer()->first()->town}}<br>
					{{$equipment->customer()->first()->county}}<br>
					{{$equipment->customer()->first()->postcode}}</td>
				<td>{{$equipment->customer()->first()->pivot->install_date}}</td>
				<td>{{$equipment->customer()->first()->pivot->internal_warranty_period}}</td>
				<td>{{$equipment->make}}</td>
				<td>{{$equipment->model}}</td>
				<td>{{substr($equipment->description,0,90)}}</td>
			</tr>
		</tbody>
		@endforeach
	</table>

@endsection


