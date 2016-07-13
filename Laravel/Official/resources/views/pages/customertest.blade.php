@extends('master2')
@section('title','Customers')

@section('content')
	<div class="col-md-2">
		<a href="/customertest">
			<img src="{{('/images/Customers.jpeg')}}" alt="" class="img-center" width="75%">
		</a><br>
		<a href="/customers/create" class="btn btn-default">Create customer</a>
	</div>
	
	<div class="col-md-8" style="background-color:#0099e6">	
		<h1>Customers</h1>
		<hr />
		<div class='col-md-12'>
			<div class="panel panel-default">
				<div class="panel-heading">
				<strong>Company name</strong>
				</div> <!-- class="panel-heading" -->
				<div class="panel-body">
				<p>Contact: 01639789676 </p>
				</div> <!-- class="panel-body" -->
			</div> <!-- class="panel panel-default" -->
		</div>
	
	</div>
@endsection