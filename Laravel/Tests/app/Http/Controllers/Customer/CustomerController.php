<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;

use DB;
use Validator;
use Input;
use Redirect;
use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
	
	/**
	 * Instantiate a new UserController instance.
	 *
	 * @return void
	 */
	public function __construct(customer $customer)
	{
		$this->customer = $customer;
		// if you add this then customer pages can only be viewed by users
		//$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$customer = DB::table('customers')->paginate(12);
		return view('customers.index')->with('customer',$customer);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//if(Auth::user()->hasRole('Manager')){
			return view('customers.create');
		//}else{
			//return Redirect::to('customers')->with('alert', 'You do not have permission to create a customer');
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
			'company_name' => 'required',
			'primary_telephone' => 'required',
		);
		
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('customers/create')
				->withErrors($validator);
		} else {
			// store
			//$company_name = str_replace('.','',Input::get('company_name'));
			
			$customer = new customer;
			$customer->company_name = Input::get('company_name');
			$customer->contact_name = Input::get('contact_name');
			$customer->address_1 = Input::get('address_1');
			$customer->address_2 = Input::get('address_2');
			$customer->address_3 = Input::get('address_3');
			$customer->town = Input::get('town');
			$customer->county = Input::get('county');
			$customer->postcode = Input::get('postcode');
			$customer->primary_telephone = Input::get('primary_telephone');
			$customer->alternate_telephone = Input::get('alternate_telephone');
			$customer->mobile = Input::get('mobile');
			$customer->email = Input::get('email');
			$customer->save();


			// redirect
			return Redirect::to('customers')->with('message', 'Successfully created customer!');
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
		$customer = customer::where('id', $id)->first();
		return view('customers.show')->with('customer',$customer);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$customer = customer::where('id', $id)->first();
		
		//if(Auth::user()->hasRole('Manager') && $customer->users()->find(Auth::user()->id)){
			return view('customers.edit')->with('customer', $customer);
		//} else {
			//return Redirect::to('customers')->with('alert', 'You do not have permission to edit this customer');
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
		$customer = customer::where('id', $id)->first();
		
		$rules = array(
			'company_name' => 'required',
			'primary_telephone' => 'required',
		);
		
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('customers/' . $id . '/edit')
				->withErrors($validator);        
		} else {
			$customer->company_name = Input::get('company_name');
			$customer->contact_name = Input::get('contact_name');
			$customer->address_1 = Input::get('address_1');
			$customer->address_2 = Input::get('address_2');
			$customer->address_3 = Input::get('address_3');
			$customer->town = Input::get('town');
			$customer->county = Input::get('county');
			$customer->postcode = Input::get('postcode');
			$customer->primary_telephone = Input::get('primary_telephone');
			$customer->alternate_telephone = Input::get('alternate_telephone');
			$customer->mobile = Input::get('mobile');
			$customer->email = Input::get('email');
			$customer->save();
			
			return Redirect::to('customers/' . $id)->with('message','Successfully updated customer!');
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
		$customer= customer::where('id', $id)->first();

		//if(Auth::user()->hasRole('Manager')&& $customer->users()->find(Auth::user()->id)){
			// delete
			$customer->delete();

			// redirect
			return Redirect::to('customers')->with('message', 'Successfully deleted customer');
		//} else {
		//	return Redirect::to('customers')->with('message', 'You do not have permission to delete a customer');    
		//}
	}




}
