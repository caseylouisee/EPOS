<?php

namespace App\Http\Controllers\Contract;

use Illuminate\Http\Request;

use DB;
use Validator;
use Input;
use Redirect;
use App\Contract;
use App\Equipment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class ContractController extends Controller{
	
	/**
	 * Instantiate a new UserController instance.
	 *
	 * @return void
	 */
	public function __construct(Contract $contract){
		$this->contract = $contract;
		// if you add this then contract pages can only be viewed by users
		//$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$contract = DB::table('contracts')->paginate(10);
		return view('contracts.index')->with('contract',$contract);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		$equipments = Equipment::lists('id', 'id');
		$warranty_periods = ['6' => '6 Months', '12' => '12 Months'];
		//if(Auth::user()->hasRole('Manager')){
			return view('contracts.create', compact('warranty_periods','equipments'));
		//}else{
			//return Redirect::to('contracts')->with('alert', 'You do not have permission to create a contract');
		//}
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
		$rules = array(
			'start' => 'required|date_format:d-m-Y',
			'length' => 'required',
		);
		
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('contracts/create')
				->withErrors($validator);
		} else {
			// store
			//$company_name = str_replace('.','',Input::get('company_name'));
			
			$contract = new Contract;
			$contract->equipment_id = Input::get('equipment_id');
			$contract->start = Input::get('start');
			$contract->length = Input::get('length');
			$contract->value = Input::get('value');
			$contract->type = Input::get('type');
			$contract->paid = Input::get('paid');
			$contract->discount = Input::get('discount');
			$contract->notes = Input::get('notes');
			$contract->save();

			// redirect
			return Redirect::to('contracts')->with('message', 'Successfully created contract!');
		}
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  $slug
	 * @return Response
	 */
	public function show($id){
		$contract = Contract::where('id', $id)->first();
		
		//status
		$start = Carbon::parse($contract->start);
		$numMonths = $contract->length;
		$today = Carbon::today();
		$end = $start->addMonth($numMonths);
		$endDate = $end->toDateString();
		if($end->lt($today)){
			$status = "Expired";
		} else if($end->eq($today)){
			$status = "Expires today";
		} else {
			$status = "Active";
		}
		
		return view('contracts.show', compact('contract','status','endDate'));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  $id
	 * @return Response
	 */
	public function edit($id){
		$equipments = Equipment::lists('id', 'id');
		$contract = Contract::where('id', $id)->first();
		$warranty_periods = ['6' => '6 Months', '12' => '12 Months'];
		
		//if(Auth::user()->hasRole('Manager') && $contract->users()->find(Auth::user()->id)){
			return view('contracts.edit', compact('contract','warranty_periods','equipments'));
		//} else {
			//return Redirect::to('contracts')->with('alert', 'You do not have permission to edit this contract');
		//}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id){
		$contract = Contract::where('id', $id)->first();
		
		$rules = array(
			'start' => 'required|date_format:d-m-Y',
			'length' => 'required',
		);
		
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('contracts/' . $id . '/edit')
				->withErrors($validator);        
		} else {
			$contract->equipment_id = Input::get('equipment_id');
			$contract->start = Input::get('start');
			$contract->length = Input::get('length');
			$contract->value = Input::get('value');
			$contract->type = Input::get('type');
			$contract->paid = Input::get('paid');
			$contract->discount = Input::get('discount');
			$contract->notes = Input::get('notes');
			$contract->save();
			
			return Redirect::to('contracts/' . $id)->with('message','Successfully updated contract!');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		$contract= Contract::where('id', $id)->first();

		//if(Auth::user()->hasRole('Manager')&& $contract->users()->find(Auth::user()->id)){
			// delete
			$contract->delete();

			// redirect
			return Redirect::to('contracts')->with('message', 'Successfully deleted contract');
		//} else {
		//	return Redirect::to('contracts')->with('message', 'You do not have permission to delete a contract');    
		//}
	}

}
