@extends('pdfmaster')

@section('title', 'Equipment')

@section('content')
	<h1>Equipment</h1>
	<strong> Date Produced: {{$todaysDate}} </strong>

	<table class = "table">
		<thead>
			<tr border="1">
				<th>Make</th>
				<th>Model</th>
				<th>Description</th>
			</tr>
		</thead>
		@foreach($equipments as $equipment)
		<tbody>
			<tr>
				<td>{{$equipment->make}}</td>
				<td>{{$equipment->model}}</td>
				<td>{{substr($equipment->description,0,90)}}</td>
			</tr>
		</tbody>
		@endforeach
	</table>
@endsection
