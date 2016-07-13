@extends('master')
@section('title','Manufacturers')

@section('content')

	<a href="/manufacturers/create" class="btn btn-default pull-right">Create Manufacturer</a>
	
	<h1>Manufacturers</h1>
	
	<div class="form-group">
		<div class="col-md-9">
		{!! Form::model($manufacturer, array('method' => 'GET', 'route' => array('manufacturers.search'))) !!}
		
			{!! Form::text('input', null, ['class' => 'form-control', 'style'=>'font-size: 20px', 'placeholder'=>'Search...']) !!}		
		</div>
	
		<div class="col-md-3">	
			{!! Form::submit('Search', array('class' => 'btn btn-primary form-control', 'style'=>'font-size: 16px',)) !!}
		{!! Form::close() !!}
		</div>
	</div> <!-- class="form-group" -->
	
	<hr />
	<div class='col-md-12'>
	@foreach($manufacturer as $manufacturers)
		<div class='col-md-4'>
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong><a href="/manufacturers/{{$manufacturers->id}}">{{$manufacturers->manufacturer_name}}</a></strong>
			</div> <!-- class="panel-heading" -->
			<div class="panel-body">
				<p>Contact: {{$manufacturers->primary_telephone}} </p>
			</div> <!-- class="panel-body" -->
		</div> <!-- class="panel panel-default" -->
		</div>
	@endforeach
	</div>
	
	{!! $manufacturer->render() !!}


@endsection