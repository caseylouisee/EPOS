@extends('master')
@section('title','Equipment')

@section('content')

	<a href="/equipments/create" class="btn btn-default pull-right">Add Equipment</a>

	<h1>Equipment</h1>
	
	<div class="form-group">
		<div class="col-md-9">
		{!! Form::model($equipments, array('method' => 'GET', 'route' => array('equipments.search'))) !!}
		
			{!! Form::text('input', null, ['class' => 'form-control', 'style'=>'font-size: 20px', 'placeholder'=>'Search...']) !!}		
		</div>
	
		<div class="col-md-3">	
			{!! Form::submit('Search', array('class' => 'btn btn-primary form-control','style'=>'font-size: 16px',)) !!}
		{!! Form::close() !!}
		</div>
	</div> <!-- class="form-group" -->
		
	<br><br>
		
	<div class="form-group">
		<div class="col-md-9">
		{!! Form::model($equipments, array('method' => 'GET', 'route' => array('equipments.filter'))) !!}

			{!! Form::select('manufacturer_id', $manufacturers, Input::old('manufacturer_id'), ['class'=>'form-control', 'style'=>'font-size: 20px']) !!}
		</div>
		<div class="col-md-3">
			{!! Form::submit('Filter', array('class' => 'btn btn-primary form-control','style'=>'font-size: 16px',)) !!}
		{!! Form::close() !!}
		</div>
	</div>

	<br><br>
	
	<div class="form-group">
		{!! Form::model($equipments, array('method' => 'GET', 'route' => array('equipments.manufacturerwarranty'))) !!}					
		{!! Form::submit('Manufacturer Warranty Ended', array('class' => 'btn btn-warning col-md-3','style'=>'font-size: 16px',)) !!}
		{!! Form::close() !!}
	
		{!! Form::model($equipments, array('method' => 'GET', 'route' => array('equipments.internalwarranty'))) !!}
		{!! Form::submit('Internal Warranty Ended', array('class' => 'btn btn-primary col-md-3','style'=>'font-size: 16px',)) !!}
		{!! Form::close() !!}
		
		{!! Form::model($equipments, array('method' => 'GET', 'route' => array('equipments.addedinthelastweek'))) !!}
		{!! Form::submit('Added in the last week', array('class' => 'btn btn-default col-md-3','style'=>'font-size: 16px',)) !!}
		{!! Form::close() !!}
	</div>
	
	<br><br>
	
	<a href="/downloadEquipments" class="btn btn-default pull-right">Download All</a>
	<a href="/downloadEquipmentInternalWarrantyExpired" class="btn btn-default pull-right">Download Expired Internal Warranties</a>
	<a href="/downloadEquipmentInternalWarrantyExpiringThisWeek" class="btn btn-default pull-right">Download Internal Warranty Expiring This Week</a>

	
	<br><br>
	<hr />		
		
	<div class='col-md-12'>
	@foreach($equipments as $equipment)
		<div class='col-md-4'>
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong><a href="/equipments/{{$equipment->id}}">{{$equipment->make}}, {{$equipment->model}}</a></strong>
			</div> <!-- class="panel-heading" -->
			<div class="panel-body">
				<p>Description: {{substr($equipment->description,0,50)}} ... </p>
			</div> <!-- class="panel-body" -->
		</div> <!-- class="panel panel-default" -->
		</div>
	@endforeach
	</div>
	
	{!! $equipments->render() !!}

@endsection

@section('footer')

@endsection

