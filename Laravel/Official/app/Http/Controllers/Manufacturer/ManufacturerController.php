<?php

namespace App\Http\Controllers\Manufacturer;

use Illuminate\Http\Request;

use DB;
use Validator;
use Input;
use Redirect;
use App\Manufacturer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ManufacturerController extends Controller{
	
	/**
	 * Instantiate a new UserController instance.
	 *
	 * @return void
	 */
	public function __construct(Manufacturer $manufacturer){
		$this->manufacturer = $manufacturer;
		// if you add this then manufacturer pages can only be viewed by users
		//$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		$manufacturer = DB::table('manufacturers')->paginate(12);
		return view('manufacturers.index')->with('manufacturer',$manufacturer);
	}
	
	public function search(){
		$input = Input::get('input');
		$manufacturer = Manufacturer::search($input)->paginate(12);
		return view('manufacturers.index', compact('manufacturer','input'));
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		//if(Auth::user()->hasRole('Manager')){
			return view('manufacturers.create');
		//}else{
			//return Redirect::to('manufacturers')->with('alert', 'You do not have permission to create a manufacturer');
		//}
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
		$rules = array(
			'manufacturer_name' => 'required',
			'primary_telephone' => 'required',
		);
		
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('manufacturers/create')
				->withErrors($validator);
		} else {
			// store
			//$company_name = str_replace('.','',Input::get('company_name'));
			
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


			// redirect
			return Redirect::to('manufacturers')->with('message', 'Successfully created manufacturer!');
		}
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  $slug
	 * @return Response
	 */
	public function show($id){
		$manufacturer = Manufacturer::where('id', $id)->first();
		return view('manufacturers.show')->with('manufacturer',$manufacturer);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  $id
	 * @return Response
	 */
	public function edit($id){
		$manufacturer = Manufacturer::where('id', $id)->first();
		
		//if(Auth::user()->hasRole('Manager') && $manufacturer->users()->find(Auth::user()->id)){
			return view('manufacturers.edit')->with('manufacturer', $manufacturer);
		//} else {
			//return Redirect::to('manufacturers')->with('alert', 'You do not have permission to edit this manufacturer');
		//}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id){
		$manufacturer = Manufacturer::where('id', $id)->first();
		
		$rules = array(
			'manufacturer_name' => 'required',
			'primary_telephone' => 'required',
		);
		
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('manufacturers/' . $id . '/edit')
				->withErrors($validator);        
		} else {
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
			
			return Redirect::to('manufacturers/' . $id)->with('message','Successfully updated manufacturer!');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		$manufacturer= Manufacturer::where('id', $id)->first();

		//if(Auth::user()->hasRole('Manager')&& $manufacturer->users()->find(Auth::user()->id)){
			// delete
			$manufacturer->delete();

			// redirect
			return Redirect::to('manufacturers')->with('message', 'Successfully deleted manufacturer');
		//} else {
		//	return Redirect::to('manufacturers')->with('message', 'You do not have permission to delete a manufacturer');    
		//}
	}
}
