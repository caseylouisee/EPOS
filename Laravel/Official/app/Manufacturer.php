<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Manufacturer extends Model {	
	
	use Eloquence;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'manufacturers';
	
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['manufacturer_name', 'contact_name', 'account_no', 'address_1', 'address_2', 'town', 'county', 'postcode', 'primary_telephone', 'alternate_telephone', 'fax', 'email', 'website'];
	
	protected $searchableColumns = ['manufacturer_name'];
	
	public function equipment(){
		return $this->hasMany('App\Equipment');
	}
		
}
