@extends('master')
@section('title','Contracts')

@section('content')

	<a href="/contracts/create" class="btn btn-default pull-right">Create Contract</a>
	
	<h1>Contracts</h1>
	<hr />
	<div class='col-md-12'>
	@foreach($contract as $contracts)
		<div class='col-md-4'>
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong><a href="/contracts/{{$contracts->id}}">{{$contracts->id}}</a></strong>
			</div> <!-- class="panel-heading" -->
		</div> <!-- class="panel panel-default" -->
		</div>
	@endforeach
	</div>

	{!! $contract->render() !!}

@endsection