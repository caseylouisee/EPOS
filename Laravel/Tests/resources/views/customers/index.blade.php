@extends('master')
@section('title','Customers')

@section('content')

	<a href="/customers/create" class="btn btn-default pull-right">Create customer</a>
	
	<h1>Customers</h1>
	<hr />
	<div class='col-md-12'>
	@foreach($customer as $customers)
		<div class='col-md-4'>
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong><a href="/customers/{{$customers->id}}">{{$customers->company_name}}</a></strong>
			</div> <!-- class="panel-heading" -->
			<div class="panel-body">
				<p>Contact: {{$customers->primary_telephone}} </p>
			</div> <!-- class="panel-body" -->
		</div> <!-- class="panel panel-default" -->
		</div>
	@endforeach
	</div>

	{!! $customer->render() !!}

@endsection