<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model {	
	
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
	protected $fillable = ['make', 'model', 'description', 'manufacturer_id', 'serial_no', 'type', 'license_no', 'manufacturer_warranty_period', 'customer_id', 'install_date', 'internal_warranty_period', 'purchase_value', 'payment_method', 'notes'];
	
	public function manufacturer()
	{
		return $this->belongsTo('App\Manufacturer');
	}
	
	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}
		
}
