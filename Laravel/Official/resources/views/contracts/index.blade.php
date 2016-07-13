@extends('master')
@section('title','Contracts')

@section('content')

	<a href="/contracts/create" class="btn btn-default pull-right">Create Contract</a>
	
	<h1>Contracts</h1>
	
	<a href="/downloadContracts" class="btn btn-default pull-right">Download All</a>
	<a href="/downloadContractsExpired" class="btn btn-default pull-right">Download Expired Contracts</a>
	<a href="/downloadContractsExpiringThisWeek" class="btn btn-default pull-right">Download Contracts Expiring This Week</a>
	<br>
	<hr />
	<div class='col-md-12'>
		<table class="table">
			<thead>
				<tr>
					<th>Link</th>
					<th>Equipment ID</th>
					<th>Start Date</th>
					<th>Contract Length</th>
				</tr>
			</thead>
			@foreach($contract as $contracts)
			<tbody>
				<tr>
					<td><a href="/contracts/{{$contracts->id}}/">{{$contracts->id}}</a></td>
					<td>{{$contracts->equipment_id}}</td>
					<td>{{$contracts->start}}</td>
					<td>{{$contracts->length}} Months</td>
				</tr>
			</tbody>
			@endforeach
		</table>
	</div>

	{!! $contract->render() !!}

@endsection