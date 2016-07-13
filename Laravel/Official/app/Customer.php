<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Customer extends Model {	
	
	use Eloquence;

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
	protected $fillable = ['company_name', 'contact_name', 'customer_id', 'address_1', 'address_2','address_3', 'town', 'county', 'postcode', 'primary_telephone', 'alternate_telephone','mobile', 'fax', 'email', 'notes'];
		
	protected $searchableColumns = ['company_name', 'contact_name'];

	public function equipment(){
		return $this->belongsToMany('App\Equipment', 'customer_equipments')->withPivot('install_date', 'internal_warranty_period', 'payment_method', 'lease_term', 'notes');
	}
		
}
