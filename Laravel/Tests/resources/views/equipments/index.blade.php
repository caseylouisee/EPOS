@extends('master')
@section('title','Equipment')

@section('content')

	<a href="/equipments/search" class="btn btn-default pull-right">Search</a>

	<a href="/equipments/create" class="btn btn-default pull-right">Add Equipment</a>

	
	<h1>Equipment</h1>
	
	<div class="form-group">
		{!! Form::label('manufacturer_id', 'Manufacturer') !!}
		{!! Form::select('manufacturer_id', $manufacturers, Input::old('manufacturer_id'),['class'=>'form-control', 'style'=>'font-size: 20px']) !!}		
	</div>
	
	<hr />
	
	<div class='col-md-12'>
	@foreach($equipment as $equipments)
		<div class='col-md-4'>
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong><a href="/equipments/{{$equipments->id}}">{{$equipments->make}}, {{$equipments->model}}</a></strong>
			</div> <!-- class="panel-heading" -->
			<div class="panel-body">
				<p>Description: {{substr($equipments->description,0,50)}} ... </p>
			</div> <!-- class="panel-body" -->
		</div> <!-- class="panel panel-default" -->
		</div>
	@endforeach
	</div>

	{!! $equipment->render() !!}

@endsection
