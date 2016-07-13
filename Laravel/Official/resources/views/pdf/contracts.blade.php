@extends('pdfmaster')

@section('title', 'Contracts')

@section('content')
	<h1>Contracts</h1>
	<strong> Date Produced: {{$todaysDate}} </strong>

	<table class = "table">
		<thead>
			<tr border="1">
				<th>Contract No.</th>
				<th>Equipment ID</th>
				<th>Make</th>
				<th>Model</th>
				<th>Contract Start</th>
				<th>Contract Length</th>
			</tr>
		</thead>
		@foreach($contracts as $contract)
		<tbody>
			<tr>
				<td>{{$contract->id}}</td>
				<td>{{$contract->equipment_id}}</td>
				<td>{{$contract->equipment->make}}</td>
				<td>{{$contract->equipment->model}}</td>
				<td>{{$contract->start}}</td>
				<td>{{$contract->length}} Months</td>
			</tr>
		</tbody>
		@endforeach
	</table>
@endsection
