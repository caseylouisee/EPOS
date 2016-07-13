<?php

namespace App\Http\Controllers\equipment;

use Illuminate\Http\Request;

use DB;
use Validator;
use Input;
use Redirect;
use App\Equipment;
use App\Customer;
use App\Manufacturer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EquipmentController extends Controller
{
	
	/**
	 * Instantiate a new UserController instance.
	 *
	 * @return void
	 */
	public function __construct(equipment $equipment)
	{
		$this->equipment = $equipment;
		// if you add this then equipment pages can only be viewed by users
		//$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$equipment = DB::table('equipment')->paginate(12);
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');
		return view('equipments.index', compact('equipment', 'manufacturers'));
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$customers = Customer::lists('company_name', 'id');
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');

		//if(Auth::user()->hasRole('Manager')){
			return view('equipments.create', compact('customers','manufacturers'));
		//}else{
			//return Redirect::to('equipments')->with('alert', 'You do not have permission to create a equipment');
		//}
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'description' => 'required',
			'type' => 'required',
		);
		
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('equipments/create')
				->withErrors($validator);
		} else {
			// store
			//$company_name = str_replace('.','',Input::get('company_name'));
			
			$equipment = new equipment;
			$equipment->make = Input::get('make');
			$equipment->model = Input::get('model');
			$equipment->description = Input::get('description');
			$equipment->manufacturer_id = Input::get('manufacturer_id');
			$equipment->serial_no = Input::get('serial_no');
			$equipment->type = Input::get('type');
			$equipment->license_no = Input::get('license_no');
			$equipment->manufacturer_warranty_period = Input::get('manufacturer_warranty_period');
			
			$equipment->customer_id = Input::get('customer_id');
			$equipment->install_date = Input::get('install_date');
			$equipment->internal_warranty_period = Input::get('internal_warranty_period');
			$equipment->purchase_value = Input::get('purchase_value');
			$equipment->payment_method = Input::get('payment_method');
			$equipment->notes = Input::get('notes');
			$equipment->save();

			// redirect
			return Redirect::to('equipments')->with('message', 'Successfully created equipment!');
		}
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  $slug
	 * @return Response
	 */
	public function show($id)
	{
		$equipment = equipment::where('id', $id)->first();
		return view('equipments.show')->with('equipment',$equipment);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$equipment = equipment::where('id', $id)->first();
		$customers = Customer::lists('company_name', 'id');
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');
		
		//if(Auth::user()->hasRole('Manager') && $equipment->users()->find(Auth::user()->id)){
			return view('equipments.edit', compact('equipment', 'customers', 'manufacturers'));
		//} else {
			//return Redirect::to('equipments')->with('alert', 'You do not have permission to edit this equipment');
		//}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$equipment = Equipment::where('id', $id)->first();
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');
		$customers = Customer::lists('company_name', 'id');
		
		$rules = array(
			'description' => 'required',
			'type' => 'required',
		);
		
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('equipments/' . $id . '/edit')
				->withErrors($validator);        
		} else {
			$equipment->make = Input::get('make');
			$equipment->model = Input::get('model');
			$equipment->description = Input::get('description');
			$equipment->manufacturer_id = Input::get('manufacturer_id');
			$equipment->serial_no = Input::get('serial_no');
			$equipment->type = Input::get('type');
			$equipment->license_no = Input::get('license_no');
			$equipment->manufacturer_warranty_period = Input::get('manufacturer_warranty_period');
			
			$equipment->customer_id = Input::get('customer_id');
			$equipment->install_date = Input::get('install_date');
			$equipment->internal_warranty_period = Input::get('internal_warranty_period');
			$equipment->purchase_value = Input::get('purchase_value');
			$equipment->payment_method = Input::get('payment_method');
			$equipment->notes = Input::get('notes');
			$equipment->save();
			
			return Redirect::to('equipments/' . $id)->with('message','Successfully updated equipment!');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$equipment= Equipment::where('id', $id)->first();

		//if(Auth::user()->hasRole('Manager')&& $equipment->users()->find(Auth::user()->id)){
			// delete
			$equipment->delete();

			// redirect
			return Redirect::to('equipments')->with('message', 'Successfully deleted equipment');
		//} else {
		//	return Redirect::to('equipments')->with('message', 'You do not have permission to delete a equipment');    
		//}
	}
}
