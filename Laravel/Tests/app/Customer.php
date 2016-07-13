<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'customers';
	
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['company_name', 'contact_name', 'customer_id', 'address_1', 'address_2',
		'address_3', 'town', 'county', 'postcode', 'primary_telephone', 'alternate_telephone',
		'mobile', 'email'];
		
	public function equipment()
	{
		return $this->hasMany('App\Equipment');
	}
		
}
