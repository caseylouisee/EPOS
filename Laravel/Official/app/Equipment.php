<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Equipment extends Model {	
	
	use Eloquence;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'equipment';
	
	public $timestamps = false;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['make', 'model', 'description', 'manufacturer_id', 'serial_no', 'type', 'license_no', 'date_added', 'manufacturer_warranty_period', 'date_updated'];
	
	protected $searchableColumns = ['make', 'model'];
	
	public function manufacturer(){
		return $this->belongsTo('App\Manufacturer');
	}
	
	public function customer(){
		return $this->belongsToMany('App\Customer', 'customer_equipments')->withPivot('install_date', 'internal_warranty_period', 'payment_method', 'lease_term', 'notes');
	}
	
	public function contract(){
		return $this->hasMany('App\Contract');
	}
		
}
