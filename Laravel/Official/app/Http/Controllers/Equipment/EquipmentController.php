<?php

namespace App\Http\Controllers\equipment;

use Illuminate\Http\Request;

use DB;
use Validator;
use Input;
use Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Equipment;
use App\Customer;
use App\Manufacturer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class EquipmentController extends Controller{
	
	/**
	 * Instantiate a new UserController instance.
	 *
	 * @return void
	 */
	public function __construct(equipment $equipment){
		$this->equipment = $equipment;
		// if you add this then equipment pages can only be viewed by users
		//$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');
		$equipments = DB::table('equipment')->paginate(12);
		return view('equipments.index', compact('equipments', 'manufacturers'));
	}
	
	public function search(){
		$input = Input::get('input');
		$equipments = Equipment::search($input)->paginate(12);
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');

		return view('equipments.index', compact('equipments','input','manufacturers'));
	}
	
	public function filter() {
		$input = Input::get('manufacturer_id');
		
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');

		// Sets the parameters from the get request to the variables.
		$manufacturer = Input::get('manufacturer_id');
		
		// Perform the query using Query Builder
		$equipments = DB::table('equipment')
			->select(DB::raw("*"))
			->where('manufacturer_id', '=', $manufacturer)
			->paginate(12);

		return view('equipments.index', compact('equipments','input','manufacturers'));
	}
	
	public function manufacturerwarranty() {
		
		$input = "test input";
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');
		
		$lists = DB::table('equipment')->get();
		
		$collection = new Collection();
		
		$today = Carbon::today();
		
		foreach($lists as $equipment){
			//Manufacturer's warranty comparison
			$startDate = Carbon::parse($equipment->date_added);

			if($equipment->manufacturer_warranty_period!=null){
				$warrantyEnd = Carbon::parse($equipment->date_added)->modify('+1 year');
				if($warrantyEnd->lt($today)){
					$manufacturerresult="No longer on warranty";
					$collection->push($equipment);
				} else if($warrantyEnd->eq($today)){
					$internalresult="Warranty up today";
				} else {
					$manufacturerresult="Warranty still valid";
				}
			}
		}
			
		$equipments = $collection->all();
		
		$perPage = 12;
		$currentPage = Input::get('page') - 1;
		$pagedData = array_slice($equipments, $currentPage * $perPage, $perPage);
		$equipments = new LengthAwarePaginator($pagedData, count($equipments), $perPage);
		
		return view('equipments.index', compact('equipments', 'input', 'manufacturers'));
	}
	
	public function internalwarranty() {
		
		$input = "test input";
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');
		
		$lists = Equipment::all();
		
		$collection = new Collection();
		
		$today = Carbon::today();
		
		foreach($lists as $equipment){
			if($equipment->customer()->first()!==null){
				$iwarrantyStart = Carbon::parse($equipment->customer()->first()->pivot->install_date);
				$numMonths = $equipment->customer()->first()->pivot->internal_warranty_period;
				$iwarrantyEnd = $iwarrantyStart->addMonth($numMonths);
			
				if($iwarrantyEnd->lt($today)){
					$internalresult="No longer on warranty";
					$collection->push($equipment);
				} else if($iwarrantyEnd->eq($today)){
					$internalresult="Warranty up today";
				} else {
					$internalresult="Warranty still valid";
				}	
			}
		}
			
		$equipments = $collection->all();
		
		$perPage = 12;
		$currentPage = Input::get('page') - 1;
		$pagedData = array_slice($equipments, $currentPage * $perPage, $perPage);
		$equipments = new LengthAwarePaginator($pagedData, count($equipments), $perPage);
		
		return view('equipments.index', compact('equipments', 'input', 'manufacturers'));
	}
	
	public function addedinthelastweek() {
		
		$input = "test input";
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');
		
		$lists = Equipment::all();
		
		$collection = new Collection();
		
		$today = Carbon::today();
		
		$weekago = Carbon::parse($today)->subWeek(1);
		
		foreach($lists as $equipment){
			$date_added = Carbon::parse($equipment->date_added);
			if($date_added->lte($today)&&$date_added->gte($weekago)){
				$collection->push($equipment);
			} else {
				$internalresult="Warranty still valid";
			}	
		}
			
		$equipments = $collection->all();
		
		$perPage = 12;
		$currentPage = Input::get('page') - 1;
		$pagedData = array_slice($equipments, $currentPage * $perPage, $perPage);
		$equipments = new LengthAwarePaginator($pagedData, count($equipments), $perPage);
		
		return view('equipments.index', compact('equipments', 'input', 'manufacturers'));
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		$customers = Customer::lists('company_name', 'id');
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id')->all();
		$manufacturers = $manufacturers + ['Add New' => 'Add New*'];
		$warranty_periods = ['6' => '6 Months', '12' => '12 Months'];
		
		//if(Auth::user()->hasRole('Manager')){
			return view('equipments.create', compact('customers','manufacturers','warranty_periods'));
		//}else{
			//return Redirect::to('equipments')->with('alert', 'You do not have permission to create a equipment');
		//}
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
		$rules = array(
			'make' => 'required',
			'model' => 'required',
			'description' => 'required',
			'manufacturer_id' => 'required',
			'date_added' => 'required|date_format:d-m-Y',
			
			//customer_equipment pivot validation
			'install_date' => 'date_format:d-m-Y',
		);
		
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('equipments/create')
				->withErrors($validator);
		} else {			
			$equipment = new Equipment;
			$equipment->make = Input::get('make');
			$equipment->model = Input::get('model');
			$equipment->description = Input::get('description');
			
			if(Input::get('manufacturer_id')=='Add New'){
				$manufacturer = new Manufacturer;
				$manufacturer->manufacturer_name = Input::get('manufacturer_name');
				$manufacturer->contact_name = Input::get('contact_name');
				$manufacturer->account_no = Input::get('account_no');
				$manufacturer->address_1 = Input::get('address_1');
				$manufacturer->address_2 = Input::get('address_2');
				$manufacturer->town = Input::get('town');
				$manufacturer->county = Input::get('county');
				$manufacturer->postcode = Input::get('postcode');
				$manufacturer->primary_telephone = Input::get('primary_telephone');
				$manufacturer->alternate_telephone = Input::get('alternate_telephone');
				$manufacturer->fax = Input::get('fax');
				$manufacturer->email = Input::get('email');
				$manufacturer->website = Input::get('website');
				$manufacturer->save();
				
				$equipment->manufacturer_id = $manufacturer->id;
			} else {
				$equipment->manufacturer_id = Input::get('manufacturer_id');
			}
			
			$equipment->serial_no = Input::get('serial_no');
			$equipment->type = Input::get('type');
			$equipment->license_no = Input::get('license_no');
			$equipment->date_added = Carbon::parse(Input::get('date_added'))->toDateString();
			$equipment->manufacturer_warranty_period = Input::get('manufacturer_warranty_period');

			$equipment->date_updated = Carbon::now()->toDateString();
			
			$equipment->save();
		
			$customer_id = Input::get('customer_id');

			if(Input::has('assign_checkbox')){
				$equipment->customer()->attach($customer_id,
					['equipment_id' => $equipment->id,
					 'install_date' => Carbon::parse(Input::get('install_date'))->toDateString(),
					 'internal_warranty_period' => Input::get('internal_warranty_period'),
					 'payment_method' => Input::get('payment_method'),
					 'lease_term' => Input::get('lease_term'),
					 'notes' => Input::get('notes')
					]);
			} else {
				$equipment->customer()->detach($customer_id);
			}

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
	public function show($id){
		$equipment = Equipment::where('id', $id)->first();
		
		$startDate = Carbon::parse($equipment->date_added);
		$today = Carbon::today();
		$stringToday = Carbon::today()->toDateString();

		//Manufacturer's warranty comparison
		if($equipment->date_added==""){
			$manufacturerresult = "No start date specified";
		} else {
			$mwarrantyStart = Carbon::parse($equipment->date_added);
			$numMonths = $equipment->manufacturer_warranty_period;
			$mwarrantyEnd = $mwarrantyStart->addMonth($numMonths);
			
			if($mwarrantyEnd->lt($today)){
				$manufacturerresult="No longer on warranty";
			} else if($mwarrantyEnd->eq($today)){
				$manufacturerresult = "Warranty up today";
			} else {
				$manufacturerresult="Warranty still valid";
			}
		}	
		
		//Internal warranty comparison
		if($equipment->customer()->first()==null){
			$internalresult = "";
		} else {
			if($equipment->customer()->first()->pivot->internal_warranty_period==""){
				$internalresult = "No start date specified";
			} else {
				$iwarrantyStart = Carbon::parse($equipment->customer()->first()->pivot->install_date);
				$numMonths = $equipment->customer()->first()->pivot->internal_warranty_period;
				$iwarrantyEnd = $iwarrantyStart->addMonth($numMonths);
				
				if($iwarrantyEnd->lt($today)){
					$internalresult="No longer on warranty";
				} else if($iwarrantyEnd->eq($today)){
					$internalresult = "Warranty up today";
				} else {
					$internalresult="Warranty still valid";
				}	
			}
		}
		
		return view('equipments.show', compact('equipment', 'manufacturerresult', 'internalresult','stringToday'));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  $id
	 * @return Response
	 */
	public function edit($id){
		$equipment = Equipment::where('id', $id)->first();
		$customers = Customer::lists('company_name', 'id');
		$customer_equipment = DB::table('customer_equipments')->where('equipment_id',$id)->first();
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');
		$warranty_periods = ['6' => '6 Months', '12' => '12 Months'];
		
		//if(Auth::user()->hasRole('Manager') && $equipment->users()->find(Auth::user()->id)){
			return view('equipments.edit', compact('equipment', 'customers', 'manufacturers', 'customer_equipment','warranty_periods'));
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
	public function update(Request $request, $id){
		$equipment = Equipment::where('id', $id)->first();
		$manufacturers = Manufacturer::lists('manufacturer_name', 'id');
		$customers = Customer::lists('company_name', 'id');
		$customer_equipment = DB::table('customer_equipments')->where('equipment_id',$id)->first();
		
		$rules = array(
			'make' => 'required',
			'model' => 'required',
			'description' => 'required',
			'manufacturer_id' => 'required',
			'date_added' => 'required|date_format:d-m-Y',
			
			//customer_equipment pivot validation
			'install_date' => 'date_format:d-m-Y',
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
			$equipment->date_added = Carbon::parse(Input::get('date_added'))->toDateString();
			$equipment->manufacturer_warranty_period = Input::get('manufacturer_warranty_period');
			$equipment->date_updated = Carbon::now()->toDateString();
			
			$equipment->save();
		
			$customer_id = Input::get('customer_id');

			if($customer_equipment==null){
				if(Input::has('assign_checkbox')){
					 
					$equipment->customer()->attach($customer_id,
						['equipment_id' => $equipment->id,
						 'install_date' => Carbon::parse(Input::get('install_date'))->toDateString(),
						 'internal_warranty_period' => Input::get('internal_warranty_period'),
						 'payment_method' => Input::get('payment_method'),
						 'lease_term' => Input::get('lease_term'),
						 'notes' => Input::get('notes')
						]);
				} else {
					$equipment->customer()->detach($customer_id);
				}
			
			} else {

				if(Input::has('assign_checkbox')){
				 
					$equipment->customer()->updateExistingPivot($customer_id,
						['equipment_id' => $equipment->id,
						 'install_date' => Carbon::parse(Input::get('install_date'))->toDateString(),
						 'internal_warranty_period' => Input::get('internal_warranty_period'),
						 'payment_method' => Input::get('payment_method'),
						 'lease_term' => Input::get('lease_term'),
						 'notes' => Input::get('notes')
						]);
				} else {
					$equipment->customer()->detach($customer_id);
				}
			
			}
									
			return Redirect::to('equipments/' . $id)->with('message','Successfully updated equipment!');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
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
